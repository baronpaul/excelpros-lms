<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

use Session;

use Excel;

use PDF;

use App\Exam;

use App\Collection;

use App\Participation;

use App\Question;

use App\Answer;

use App\ExamParticipant;

use App\Course;

use App\TrainingProgram;

use App\User;

class AdminExamController extends Controller
{
    
protected $redirectTo = '/admin/login';


public function __construct()
{
    $this->middleware('admin.auth:admin');
}

public function index()
{
    $exams = Exam::join('collections', 'collections.collection_id', '=', 'exams.collection_id')
    ->where('exams.exam_status', '=', 'active')
    ->orderBy('exams.exam_id', 'DESC')
    ->get();

    $training_programs = TrainingProgram::all();

    return view('admin.exams.index')
    ->with('exams', $exams)
    ->with('training_programs', $training_programs);
}


public function active()
{
    $exams = Exam::join('collections', 'collections.collection_id', '=', 'exams.collection_id')
    ->where('exams.exam_status', '=', 'active')
    ->orderBy('exams.exam_id', 'DESC')
    ->get();

    $training_programs = TrainingProgram::all();

    return view('admin.exams.active')
    ->with('exams', $exams)
    ->with('training_programs', $training_programs);
}


public function completed()
{
    $completed_exams = Exam::join('collections', 'collections.collection_id', '=', 'exams.collection_id')
    ->where('exams.exam_status', '=', 'completed')
    ->orderBy('exams.exam_id', 'DESC')
    ->get();

    $training_programs = TrainingProgram::all();

    return view('admin.exams.completed')
    ->with('completed_exams', $completed_exams)
    ->with('training_programs', $training_programs);
}


public function inactive()
{
    $inactive_exams = Exam::join('collections', 'collections.collection_id', '=', 'exams.collection_id')
    ->where('exams.exam_status', '=', 'inactive')
    ->orderBy('exams.exam_id', 'DESC')
    ->get();

    $training_programs = TrainingProgram::all();

    return view('admin.exams.inactive')
    ->with('inactive_exams', $inactive_exams)
    ->with('training_programs', $training_programs);
}


public function filterExam(Request $request) {
    $program_id = $request->program_id;
    //dd($program_id);
    $exams = Exam::join('collections', 'collections.collection_id', '=', 'exams.collection_id')
    ->where('exams.exam_status', '=', 'active')
    ->where('exams.program_id', '=', $program_id)
    ->orderBy('exams.exam_id', 'DESC')
    ->get();

    $training_programs = TrainingProgram::all();

    return view('admin.exams.index')
    ->with('exams', $exams)
    ->with('training_programs', $training_programs);
}


public function selectProgram() {
    $training_programs = TrainingProgram::join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
    ->get();

    return view('admin.exams.select_program')
    ->with('training_programs', $training_programs);
}


public function create($id)
{
    $collections = Collection::all();

    $training_program = TrainingProgram::where('program_id', $id)->first();

    return view('admin.exams.create')
    ->with('training_program', $training_program)
    ->with('collections', $collections);
}


public function store(Request $request)
{
    $this->validate($request, [
        'exam_title' => 'required',
        'collection_id' => 'required',
    ]);

    $exam = new Exam;
    $exam->exam_title = $request->exam_title;
    $exam->exam_url = str_slug($request->exam_title);
    $exam->exam_type = $request->exam_type;
    $exam->program_id = $request->program_id;
    $exam->number_of_questions = $request->no_of_questions;
    $exam->collection_id = $request->collection_id;
    $exam->time_limit = $request->time_limit;
    $exam->show_score = $request->show_score;
    $exam->exam_status = 'active';
    $exam->instructions = $request->instructions;
    $exam->save();

    Session::flash('success', 'You have successfully created an exam');

    return redirect()->route('admin.exams.index');
}


public function edit($id)
{
    $collections = Collection::all();

    $exam = Exam::where('exam_id', $id)->first();

    return view('admin.exams.edit')
    ->with('collections', $collections)
    ->with('exam', $exam);
}


public function update(Request $request)
{
    $exam_id = $request->exam_id;
    
    $exam = Exam::where('exam_id', $exam_id)->first();

    $exam->exam_title = $request->exam_title;
    $exam->exam_url = str_slug($request->exam_title);
    $exam->number_of_questions = $request->no_of_questions;
    $exam->program_id = $request->program_id;
    $exam->collection_id = $request->collection_id;
    $exam->time_limit = $request->time_limit;
    $exam->exam_status = $request->exam_status;
    $exam->show_score = $request->show_score;
    $exam->instructions = $request->instructions;
    $exam->save();

    Session::flash('success', 'You have successfully updated an exam');

    return redirect()->route('admin.exams.index');
}

public function add_participants($id) {
    
    $exam = Exam::where('exam_id', $id)->first();
    $program_id = $exam->program_id;
   
    $participants = ExamParticipant::where('exam_id', $id)->pluck('user_id')->toArray();
    $users = User::where('program_id', $program_id)->whereNotIn('users.id', $participants)->get();
    //dd($users);

    return view('admin.exams.add_participants')
    ->with('exam', $exam)
    ->with('users', $users);
}

public function do_add_participants(Request $request, $id) {
    $data = $request->except(['_token', 'exam_id', 'select_all']);
    $users = $request->users;
    //dd($users);
    
    foreach ($users as $key=>$value) {
        $user_id = $value;
        $exam_participant = new ExamParticipant;
        $exam_participant->exam_id = $id;
        $exam_participant->user_id = $user_id;
        $exam_participant->save();
    }

    Session::flash('success', 'You have successfully added participants to the exam');
    return redirect()->route('admin.exams.view', ['exam_id' => $id]);
}


public function remove_participants(Request $request, $id) {
    
    $participants = $request->participants;
    if($participants != null) {
        foreach ($participants as $key=>$value) {
            $participant_id = $value;
            $exam_participant = ExamParticipant::where('user_id', $participant_id)->first();
            $exam_participant->delete();
        }
        Session::flash('success', 'You have successfully removed participants from the exam');
        return redirect()->route('admin.exams.view', ['exam_id' => $id]);
    }
    else {
        Session::flash('warning', 'Nothing was selected');
        return redirect()->route('admin.exams.view', ['exam_id' => $id]);
    }
    
}


public function view($id) {
    $exam = Exam::join('collections', 'collections.collection_id', '=', 'exams.collection_id')
    ->where('exams.exam_id', '=', $id)
    ->first();

    $participants = ExamParticipant::join('exams', 'exams.exam_id', '=', 'exam_participants.exam_id')
    ->join('users', 'users.id', '=', 'exam_participants.user_id')
    ->where('exams.exam_id', '=', $id)
    ->get();

    return view('admin.exams.view')
    ->with('exam', $exam)
    ->with('participants', $participants);
}


public function view_questions($id) {
    $exam = Exam::join('collections', 'collections.collection_id', '=', 'exams.collection_id')
    ->where('exams.exam_id', '=', $id)
    ->first();

    $questions = Question::where('collection_id', $exam->collection_id)->get();

    return view('admin.exams.view_questions')
    ->with('exam', $exam)
    ->with('questions', $questions);
}


public function view_participation($id) {
    $exam = Exam::join('collections', 'collections.collection_id', '=', 'exams.collection_id')
    ->where('exams.exam_id', '=', $id)
    ->first();

    $participations = Participation::join('exams', 'exams.exam_id', '=', 'participations.exam_id')
    ->join('users', 'users.id', '=', 'participations.user_id')
    ->select('participations.*', 'users.firstname', 'users.lastname')
    ->where('exams.exam_id', '=', $id)
    ->get();

    $total_participations = Participation::join('exams', 'exams.exam_id', '=', 'participations.exam_id')
    ->where('exams.exam_id', '=', $exam->exam_id)
    ->count();

    $total_completed = Participation::join('exams', 'exams.exam_id', '=', 'participations.exam_id')
    ->where('exams.exam_id', '=', $exam->exam_id)
    ->where('participations.completed', '=', 'yes')
    ->count();


    return view('admin.exams.view_participation')
    ->with('exam', $exam)
    ->with('participations', $participations)
    ->with('total_participations', $total_participations)
    ->with('total_completed', $total_completed);
}


public function filtered_view(Request $request, $id) {
    
    $exam = Exam::join('collections', 'collections.collection_id', '=', 'exams.collection_id')
    ->where('exams.exam_id', '=', $id)
    ->first();

    $participations = Participation::join('exams', 'exams.exam_id', '=', 'participations.exam_id');
    $participations->join('users', 'users.id', '=', 'participations.user_id')
    ->select('participations.*', 'users.firstname', 'users.lastname','users.email', 'users.phone')
    ->where('exams.exam_id', '=', $id);
    if($request->has('min_score') && $request->min_score != '') {
        $participations->where('participations.score', '>=', $request->min_score);
    }
    $participations = $participations->get(); 

    $min_score = $request->min_score;
    Session::put('min_score', $min_score);

    $total_participations = Participation::join('exams', 'exams.exam_id', '=', 'participations.exam_id')
    ->where('exams.exam_id', '=', $exam->exam_id)
    ->count();

    $total_completed = Participation::join('exams', 'exams.exam_id', '=', 'participations.exam_id')
    ->where('exams.exam_id', '=', $exam->exam_id)
    ->where('participations.completed', '=', 'yes')
    ->count();


    return view('admin.exams.view_participation')
    ->with('exam', $exam)
    ->with('participations', $participations)
    ->with('total_participations', $total_participations)
    ->with('total_completed', $total_completed);

}

public function clear_filtered_view($id) {
    if(Session::has('min_score')) {
        Session::pull('min_score');
    }
    return redirect()->route('admin.exams.view_participation', ['id' => $id]);
}


public function export_filtered($id)
{
    $exam = Exam::where('exam_id', $id)->first();
    $participations = Participation::join('exams', 'exams.exam_id', '=', 'participations.exam_id');
    $participations->join('users', 'users.id', '=', 'participations.user_id')
    ->where('participations.exam_id', '=', $id);
    
    if(null !== Session::get('min_score')) {
        $participations->where('participations.score', '>=', Session::get('min_score'));
    }
    $participations->select('users.firstname', 'users.lastname', 'users.email', 'participations.started_at', 'participations.completed_at', 'participations.completed','participations.attempts','participations.score', 'participations.comments');

    $participations = $participations->get();

    $participationsArray = [];

    $participationsArray[] = ['Firstname', 'Lastname', 'Email', 'Time Started', 'Time Completed', 'Completed', 'No of Attempts','score', 'Comments'];

    foreach($participations as $participation) {
        $participationsArray[] = $participation->toArray();
    }
    $filename = $exam->exam_title.'-participation-report-'.time();

    Excel::create($filename, function($excel) use($participationsArray) {
        $excel->setTitle('Job Applications');
        $excel->setCreator('Quiz Master')->setCompany('Quiz Master');
        $excel->setDescription('Data of Exam Participation');
        $excel->sheet('Sheet 1', function($sheet) use($participationsArray) {
            $sheet->fromArray($participationsArray, null, 'A1', false, false);
        });
    })->download('xlsx');
}


public function view_participation_detail($id) {
    $participation = Participation::join('users', 'users.id', '=', 'participations.user_id')
    ->select('participations.*', 'users.firstname', 'users.lastname','users.email', 'users.phone', 'users.profile_pic')
    ->where('participations.id', '=', $id)
    ->first();

    $exam = Exam::where('exam_id', $participation->exam_id)->first();

    $answers = Answer::join('questions', 'questions.question_id', '=', 'answers.question_id')
    ->where('answers.participation_id', '=', $id)
    ->get();
    
    if($exam->exam_type == 'multiple choice') {
        return view('admin.participations.detail_obj')
        ->with('participation', $participation)
        ->with('exam', $exam)
        ->with('answers', $answers);
    }
    else {
        return view('admin.participations.detail_essay')
        ->with('participation', $participation)
        ->with('exam', $exam)
        ->with('answers', $answers);
    }
}


public function export_participation_detail($id) {
    $participation = Participation::join('users', 'users.id', '=', 'participations.user_id')
    ->select('participations.*', 'users.id', 'users.firstname', 'users.lastname', 'users.email', 'users.phone')
    ->where('participations.id', '=', $id)
    ->first();

    $exam = Exam::where('exam_id', $participation->exam_id)->first();
    
    $exam_title = $exam->exam_title;
    
    $participant_name = $participation->firstname.' '.$participation->lastname;

    $num_questions = $exam->number_of_questions;
    
    $score = $participation->score;

    $program = TrainingProgram::where('program_id', $exam->program_id)->first();

    $program = $program->program_name;

    $answers = Answer::join('questions', 'questions.question_id', '=', 'answers.question_id')
    ->where('answers.participation_id', '=', $id)
    ->get();

    if($exam->exam_type == 'multiple choice') {
        $template = 'admin.participations.obj_answer_pdf';
    }
    else {
        $template = 'admin.participations.answer_pdf';
    }

    $pdf = PDF::loadView($template,
    ['participation' => $participation, 'exam' => $exam, 'answers' => $answers, 'program' => $program, 'score' => $score]);

    return $pdf->download($exam_title.'-'.$participant_name.'.pdf');
}


public function grade_participation($id) {
    $participation = Participation::join('users', 'users.id', '=', 'participations.user_id')
    ->select('participations.*', 'users.firstname', 'users.lastname', 'users.email', 'users.phone', 'users.profile_pic')
    ->where('participations.id', '=', $id)
    ->first();

    $exam = Exam::where('exam_id', $participation->exam_id)->first();

    $answers = Answer::join('questions', 'questions.question_id', '=', 'answers.question_id')
    ->where('answers.participation_id', '=', $id)
    ->get();

    return view('admin.participations.grade_essay')
        ->with('participation', $participation)
        ->with('exam', $exam)
        ->with('answers', $answers);
}


public function submit_grade(Request $request) {
    
    $data = $request->except(['_token', 'participation_id']);

    $max_points = 0;

    $point_awarded = 0;

    foreach ($data as $key => $value) {
        $answer_id = $key;
        $answer_score = $value;

        $answer = Answer::where('answer_id', $answer_id)->first();
        $answer->answer_score = $answer_score;
        $answer->save();
        $point_awarded += $answer_score;

        $question = Question::where('question_id', $answer->question_id)->first();
        $max_point_for_question = $question->max_point;
        $max_points += $max_point_for_question;
    }

    $score = ($point_awarded / $max_points) * 100;
    $participation_id = $request->participation_id;
    
    $participation = Participation::where('id', $participation_id)->first();
    $participation->graded = 'yes';
    $participation->score = $score;
    $participation->save();

    Session::flash('success', 'You have successfully graded the participant');

    return redirect()->route('admin.participations.detail', ['id' => $participation_id]);
}


public function delete($id) {
    $collections = Collection::all();

    $exam = Exam::where('exam_id', $id)->first();

    return view('admin.exams.delete')
    ->with('collections', $collections)
    ->with('exam', $exam);
}


public function destroy(Request $request)
{
    $exam_id = $request->exam_id;
    
    $exam = Exam::where('exam_id', $exam_id)->first();

    $exam->delete();

    Session::flash('success', 'You have successfully deleted an exam');

    return redirect()->route('admin.exams.index');
}


public function delete_participation($id) {
    $participation = Participation::join('users', 'users.id', '=', 'participations.user_id')
    ->select('participations.*', 'users.firstname', 'users.lastname', 'users.email')
    ->where('participations.id', '=', $id)
    ->first();

    $exam = Exam::where('exam_id', $participation->exam_id)->first();

    return view('admin.participations.delete')
    ->with('participation', $participation)
    ->with('exam', $exam);
}


public function destroy_participation(Request $request, $exam_id) {
    $participation_id = $request->participation_id;

    $participation = Participation::where('id', $participation_id)->first();

    $answers = Answer::where('participation_id', $participation_id)->get();

    foreach($answers as $answer) {
        $answer->delete();
    }
    $participation->delete();

    Session::flash('success', 'You have successfully deleted a participation');

    return redirect()->route('admin.exams.view_participation', ['id' => $exam_id]);

}


}
