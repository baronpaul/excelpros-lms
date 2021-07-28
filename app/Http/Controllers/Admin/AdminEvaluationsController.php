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

use App\ProgramEvaluation;

use App\FacilitatorEvaluation;

class AdminEvaluationsController extends Controller
{
    
protected $redirectTo = '/admin/login';


public function __construct()
{
    $this->middleware('admin.auth:admin');
}

public function index()
{
    $training_programs = TrainingProgram::join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
    ->get();

    return view('admin.evaluations.index')
    ->with('training_programs', $training_programs);
}


public function program_evaluation($id) {
    $eval_sums = ProgramEvaluation::join('users', 'users.id', '=', 'program_evaluations.user_id')
    ->where('program_evaluations.program_id', '=', $id)
    ->groupBy('program_evaluations.content_quality_rating', 'program_evaluations.methodology_rating', 
    'program_evaluations.materials_quality_rating', 'program_evaluations.overall_rating')
    ->select(DB::raw("SUM(program_evaluations.materials_quality_rating) as total_materials_quality_rating"), 
        DB::raw("SUM(program_evaluations.methodology_rating) as total_method_rating"), 
        DB::raw("SUM(program_evaluations.content_quality_rating) as total_content_rating"), 
        DB::raw("SUM(program_evaluations.overall_rating) as total_overall_rating"))
    ->get();

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
    
    $evaluations = ProgramEvaluation::join('users', 'users.id', '=', 'program_evaluations.user_id')
    ->select('program_evaluations.*', 'users.firstname', 'users.lastname')
    ->where('program_evaluations.program_id', '=', $id)
    ->get();

    $training_program = TrainingProgram::where('program_id', $id)->first();

    return view('admin.evaluations.program_evaluation')
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

    return view('admin.evaluations.program_evaluation_detail')
    ->with('evaluation', $evaluation)
    ->with('training_program', $training_program);
}


public function export_program_evaluation($id) {
    $evaluations = ProgramEvaluation::join('users', 'users.id', '=', 'program_evaluations.user_id')
    ->where('program_evaluations.program_id', '=', $id)
    ->select('users.firstname', 
        'users.lastname', 
        'program_evaluations.learned', 
        'program_evaluations.will_apply', 
        'program_evaluations.additional_training_required', 
        'program_evaluations.content_quality_rating', 
        'program_evaluations.methodology_rating', 
        'program_evaluations.materials_quality_rating',
        'program_evaluations.overall_rating',
        'program_evaluations.overall_comment' ) 
    ->get();
 
    $training_program = TrainingProgram::where('program_id', $id)->first();

    $programArray = [];
    $programArray[] = [
        'First Name',
        'Last Name',
        'What I learnt the most',
        'What I will apply in my Job functions',
        'Additional Training Needs',
        'Content Quality',
        'Methodology',
        'Materials Quality',
        'Overall Rating',
        'Overall Comment'
    ];

    foreach($evaluations as $evaluation) {
        $programArray[] = $evaluation->toArray();
    }
    $filename = $training_program->program_name.'Evaluation Report';

    Excel::create($filename, function($excel) use($programArray) {
        $excel->setTitle('Course Evaluation Report');
        $excel->setCreator('INFORMED LMS')->setCompany('Informed LMS by Averti PM');
        $excel->setDescription('Data of Course Evaluation');
        $excel->sheet('Sheet 1', function($sheet) use($programArray) {
            $sheet->fromArray($programArray, null, 'A1', false, false);
        });
    })->download('xlsx');
}


public function facilitator_evaluations($id) {
    
    $training_program = TrainingProgram::where('program_id', $id)->first();

    $facilitators = Facilitator::join('courses', 'courses.facilitator_id', '=', 'facilitators.id')
    ->join('training_programs', 'training_programs.program_id', '=', 'courses.program_id')
    ->where('training_programs.program_id', '=', $id)
    ->get();

    return view('admin.evaluations.facilitator_evaluations')
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

    return view('admin.evaluations.facilitator_evaluation_detail')
    ->with('evaluations', $evaluations)
    ->with('facilitator', $facilitator)
    ->with('training_program', $training_program);
}


public function export_facilitator_evaluation($id, $fac_id) {
    $evaluations = FacilitatorEvaluation::join('training_programs', 'training_programs.program_id', '=', 'facilitator_evaluations.program_id')
    ->join('facilitators', 'facilitators.id', '=', 'facilitator_evaluations.facilitator_id')
    ->join('users', 'users.id','=','facilitator_evaluations.user_id')
    ->where('training_programs.program_id', '=', $id)
    ->where('facilitators.id', '=', $fac_id)
    ->select('users.firstname', 
        'users.lastname', 
        'facilitator_evaluations.topic_rating', 
        'facilitator_evaluations.content_knowledge_rating', 
        'facilitator_evaluations.content_delivery_style_rating', 
        'facilitator_evaluations.time_management_rating', 
        'facilitator_evaluations.skill_transfer_capability_rating', 
        'facilitator_evaluations.addressing_questions_rating', 
        'facilitator_evaluations.overall_rating',
        'facilitator_evaluations.overall_comment')
    ->get();

    $training_program = TrainingProgram::where('program_id', $id)->first();

    $facilitator = Facilitator::where('id', $fac_id)->first();

    $programArray = [];
    $programArray[] = [
        'First Name',
        'Last Name',
        'Topic Rating',
        'Content Knowledge',
        'Content Delivery Style',
        'Time Management',
        'Skills Transfer Capability',
        'Addressing Questions',
        'Overall Rating',
        'Overall Comment'
    ];

    foreach($evaluations as $evaluation) {
        $programArray[] = $evaluation->toArray();
    }
    $filename = $facilitator->name.' Evaluation Report for '. $training_program->program_name;

    Excel::create($filename, function($excel) use($programArray, $facilitator) {
        $excel->setTitle($facilitator->name.' Evaluation Report');
        $excel->setCreator('INFORMED LMS')->setCompany('Informed LMS by Averti PM');
        $excel->setDescription('Data of Course Evaluation');
        $excel->sheet('Sheet 1', function($sheet) use($programArray) {
            $sheet->fromArray($programArray, null, 'A1', false, false);
        });
    })->download('xlsx');

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
    
    return view('admin.evaluations.participant_facilitator_evaluation')
    ->with('evaluation', $evaluation)
    ->with('training_program', $training_program);
}

}
