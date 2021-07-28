<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

use PDF;

use Excel;

use Session;

use App\Organization;

use App\TrainingProgram;

use App\User;

use App\Participant;

use App\Course;

use App\Facilitator;

use App\CourseMaterial;

use App\CertificateIssuance;

use App\ProgramEvaluation;

use App\FacilitatorEvaluation;

class AdminProgramsController extends Controller
{
    
protected $redirectTo = '/admin/login';



public function index()
{
    $training_programs = TrainingProgram::join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
    ->get();

    return view('admin.training_programs.index')
    ->with('training_programs', $training_programs);
}


public function create()
{
    $organizations = Organization::all();

    return view('admin.training_programs.create')
    ->with('organizations', $organizations);
}


public function store(Request $request)
{
    $this->validate($request, [
        'program_name' => 'required',
        'program_description' => 'required'
    ]);

    $training_program = new TrainingProgram;
    $training_program->org_id = $request->org_id;
    $training_program->program_name = $request->program_name;
    $training_program->program_url = str_slug($request->program_name);
    $training_program->program_description = $request->program_description;
    $training_program->start_date = $request->start_date;
    $training_program->end_date = $request->end_date;
    $training_program->duration = $request->duration;
    $training_program->save();

    Session::flash('success', 'You have successfully created a training Program');
    return redirect()->route('admin.training_programs.index');
}


public function detail($id)
{
    $training_program = TrainingProgram::join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
    ->where('training_programs.program_id', '=', $id)->first();

    $courses = Course::join('facilitators', 'facilitators.id', '=', 'courses.facilitator_id')
    ->where('courses.program_id', '=', $id)->get();

    $course_materials = CourseMaterial::where('program_id', $id)->get();

    $participants = User::join('training_programs', 'training_programs.program_id','=', 'users.program_id')
    ->where('training_programs.program_id', '=', $id)
    ->orderBy('firstname', 'ASC')
    ->get();

    return view('admin.training_programs.detail')
    ->with('training_program', $training_program)
    ->with('courses', $courses)
    ->with('course_materials', $course_materials)
    ->with('participants', $participants);
}


public function edit($id)
{
    $training_program = TrainingProgram::where('program_id', $id)->first();
    $courses = Course::where('program_id', $id)->get();
    $organizations = Organization::all();

    return view('admin.training_programs.edit')
    ->with('training_program', $training_program)
    ->with('organizations', $organizations)
    ->with('courses', $courses);
}


public function update(Request $request)
{
    $training_program = TrainingProgram::where('program_id', $request->program_id)->first();

    //$training_program->org_id = $request->org_id;
    $training_program->program_name = $request->program_name;
    $training_program->program_url = str_slug($request->program_name);
    $training_program->program_description = $request->program_description;
    $training_program->start_date = $request->start_date;
    $training_program->end_date = $request->end_date;
    $training_program->duration = $request->duration;
    $training_program->save();

    Session::flash('success', 'You have successfully updated a training Program');
    return redirect()->route('admin.training_programs.index');
}


public function end_training($id)
{
    $training_program = TrainingProgram::join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
    ->where('training_programs.program_id','=', $id)->first();

    return view('admin.training_programs.end_training')
    ->with('training_program', $training_program);
}


public function do_end_training(Request $request) {
    $program_id = $request->program_id;
    $training_program = TrainingProgram::where('program_id', $request->program_id)->first();

    $participants = User::join('training_programs', 'training_programs.program_id', 'users.program_id')
    ->where('training_programs.program_id', '=', $program_id)
    ->get();

    $facilitators = Facilitator::join('courses', 'courses.facilitator_id', '=', 'facilitators.id')
    ->join('training_programs', 'training_programs.program_id', '=', 'courses.program_id')
    ->where('training_programs.program_id', '=', $program_id)
    ->get();

    $training_program->program_status = 'completed';
    $training_program->save();

    //send email to all participants

    Session::flash('success', 'You have successfully concluded the training program');
    return redirect()->route('admin.training_programs.detail', ['id' => $program_id]);
}


public function participants($id) {
    $training_program = TrainingProgram::where('program_id', $id)->first();

    $participants = User::join('training_programs', 'training_programs.program_id','=', 'users.program_id')
    ->where('training_programs.program_id', '=', $id)->get();

    return view('admin.training_programs.participants')
    ->with('training_program', $training_program)
    ->with('participants', $participants);
}


public function add_course_material($id) {
    $training_program = TrainingProgram::where('program_id', $id)->first();

    return view('admin.training_programs.add_course_material')
    ->with('training_program', $training_program);
}


public function store_course_material(Request $request) {
    $this->validate($request, [
        'file' => 'required|max:10000'
    ]);
    $program_id = $request->program_id;

    $course_material = new CourseMaterial;
    $course_material->program_id = $program_id;
    $course_material->title = $request->title;

    if($request->hasFile('file')) {
        $document_file = $request->file;
        $document_file_new_name = time().$document_file->getClientOriginalName();
        $document_file->move('uploads/documents/', $document_file_new_name);
        $course_material->file = 'uploads/documents/'.$document_file_new_name;
    }

    $course_material->save();
    Session::flash('success', 'You have successfully added a course material');
    return redirect()->route('admin.training_programs.detail', ['id' => $request->program_id]);
}


public function edit_course_material($id) {
    $course_material = CourseMaterial::where('id', $id)->first();
    $training_program = TrainingProgram::where('program_id', $course_material->program_id)->first();

    return view('admin.training_programs.edit_course_material')
    ->with('course_material', $course_material);
}


public function update_course_material(Request $request) {
    $program_id = $request->program_id;

    $course_material = CourseMaterial::where('id', $request->course_material_id)->first();
    $course_material->program_id = $program_id;
    $course_material->title = $request->title;

    if($request->hasFile('file')) {
        $document_file = $request->file;
        $document_file_new_name = time().$document_file->getClientOriginalName();
        $document_file->move('uploads/documents/', $document_file_new_name);
        $course_material->file = 'uploads/documents/'.$document_file_new_name;

    }

    $course_material->save();
    Session::flash('success', 'You have successfully updated the course material');
    return redirect()->route('admin.training_programs.detail', ['id' => $program_id]);
}


public function delete_course_material($id) {
    $course_material = CourseMaterial::where('id', $id)->first();

    return view('admin.training_programs.delete_course_materials')
    ->with('course_material', $course_material);
}


public function remove_course_material(Request $request) {
    $course_material = CourseMaterial::where('id', $request->course_material_id)->first();
    $program_id = $course_material->program_id;

    $course_material->delete();
    Session::flash('success', 'You have successfully deleted the course material');
    return redirect()->route('admin.training_programs.detail', ['id' => $program_id]);
}

public function program_evaluations($id) {
    
    $eval_sums = ProgramEvaluation::join('users', 'users.id', '=', 'program_evaluations.user_id')
    ->where('program_evaluations.program_id', '=', $id)
    ->groupBy('program_evaluations.content_quality_rating', 'program_evaluations.methodology_rating', 
    'program_evaluations.materials_quality_rating', 'program_evaluations.overall_rating')
    ->select(DB::raw("SUM(program_evaluations.materials_quality_rating) as total_materials_quality_rating"), 
        DB::raw("SUM(program_evaluations.methodology_rating) as total_method_rating"), 
        DB::raw("SUM(program_evaluations.content_quality_rating) as total_content_rating"), 
        DB::raw("SUM(program_evaluations.overall_rating) as total_overall_rating"))->get();

    //dd($eval_sums);

    $total_materials_quality_rating = 0;
    $total_method_rating = 0;
    $total_content_rating = 0;
    $total_overall_rating = 0;

    foreach($eval_sums as $sum) {
        $total_materials_quality_rating += $sum->total_materials_quality_rating;
        $total_method_rating += $sum->total_method_rating;
        $total_content_rating += $sum->total_content_rating;
        $total_overall_rating += $sum->total_overall_rating;
    }
    //dd($total_materials_quality_rating);

    $evaluations = ProgramEvaluation::join('users', 'users.id', '=', 'program_evaluations.user_id')
    ->select('program_evaluations.*', 'users.firstname', 'users.lastname')
    ->where('program_evaluations.program_id', '=', $id)
    ->get();

    $training_program = TrainingProgram::where('program_id', $id)->first();

    return view('admin.training_programs.program_evaluations')
    ->with('evaluations', $evaluations)
    ->with('total_materials_quality_rating', $total_materials_quality_rating)
    ->with('total_method_rating', $total_method_rating)
    ->with('total_content_rating', $total_content_rating)
    ->with('total_overall_rating', $total_overall_rating)
    ->with('training_program', $training_program);
}

public function program_evaluation_detail($id) {
    $evaluation = ProgramEvaluation::join('users', 'users.id', '=', 'program_evaluations.user_id')
    ->select('program_evaluations.*', 'users.firstname', 'users.lastname')
    ->where('program_evaluations.id', '=', $id)->first();

    $training_program = TrainingProgram::where('program_id', $evaluation->program_id)->first();

    return view('admin.training_programs.program_evaluation_detail')
    ->with('evaluation', $evaluation)
    ->with('training_program', $training_program);
}


public function facilitator_evaluations($id) {
    
    $training_program = TrainingProgram::where('program_id', $id)->first();

    $facilitators = Facilitator::join('courses', 'courses.facilitator_id', '=', 'facilitators.id')
    ->join('training_programs', 'training_programs.program_id', '=', 'courses.program_id')
    ->where('training_programs.program_id', '=', $id)
    ->get();

    return view('admin.training_programs.facilitator_evaluations')
    ->with('facilitators', $facilitators)
    ->with('training_program', $training_program);
}

public function facilitator_evaluation_detail($id, $fac_id) {
    $evaluations = FacilitatorEvaluation::join('training_programs', 'training_programs.program_id', '=', 'facilitator_evaluations.program_id')
    ->join('facilitators', 'facilitators.id', '=', 'facilitator_evaluations.facilitator_id')
    ->join('users', 'users.id','=','facilitator_evaluations.user_id')
    ->where('training_programs.program_id', '=', $id)
    ->where('facilitators.id', '=', $fac_id)
    ->select('facilitator_evaluations.*', 'users.firstname', 'users.lastname', 'facilitators.name')
    ->get();

    $training_program = TrainingProgram::where('program_id', $id)->first();

    $facilitator = Facilitator::where('id', $fac_id)->first();

    return view('admin.training_programs.facilitator_evaluation_detail')
    ->with('evaluations', $evaluations)
    ->with('facilitator', $facilitator)
    ->with('training_program', $training_program);
}

public function participant_facilitator_evaluation($id, $user_id) {
    $evaluation = FacilitatorEvaluation::join('training_programs', 'training_programs.program_id', '=', 'facilitator_evaluations.program_id')
    ->join('facilitators', 'facilitators.id', '=', 'facilitator_evaluations.facilitator_id')
    ->join('users', 'users.id','=','facilitator_evaluations.user_id')
    ->where('facilitator_evaluations.id', '=', $id)
    ->where('users.id', '=', $user_id)
    ->select('facilitator_evaluations.*', 'users.firstname', 'users.lastname', 'users.id as user_id', 'facilitators.name', 'training_programs.*')
    ->first();

    $training_program = TrainingProgram::where('program_id', $evaluation->program_id)->first();
    
    return view('admin.training_programs.participant_facilitator_evaluation')
    ->with('evaluation', $evaluation)
    ->with('training_program', $training_program);
}


public function delete($id)
{
    $training_program = TrainingProgram::where('program_id', $id)->first();
    $courses = Course::where('program_id', $id)->get();
    $organizations = Organization::all();

    return view('admin.training_programs.delete')
    ->with('training_program', $training_program)
    ->with('organizations', $organizations)
    ->with('courses', $courses);
}


public function destroy(Request $request) {
    $training_program = TrainingProgram::where('program_id', $request->program_id)->first();
    
    //delete course modules
    $courses = Course::where('program_id',  $request->program_id)->get();
    foreach($courses as $course) {
        $course->delete();
    }

    //delete participants
    $users = User::where('program_id',  $request->program_id)->get();
    foreach($users as $user) {
        $user->delete();
    }
    $training_program->delete();

    Session::flash('success', 'You have successfully deleted a training Program');
    return redirect()->route('admin.training_programs.index');
}

}
