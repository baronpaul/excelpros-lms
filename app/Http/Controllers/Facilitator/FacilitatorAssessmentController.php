<?php

namespace App\Http\Controllers\Facilitator;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use Session;

use PDF;

use Excel;

use App\Organization;

use App\TrainingProgram;

use App\Course;

use App\CourseMaterial;

use App\Exam;

use App\Answer;

use App\Facilitator;

use App\Participation;

use App\User;

class FacilitatorAssessmentController extends Controller
{
    protected $redirectTo = '/facilitator/login';
    
    
    public function __construct()
    {
        $this->middleware('facilitator.auth:facilitator');
    }


    public function index()
    {
        $facilitator_id = Auth::guard('facilitator')->id();

        $exams = Exam::join('training_programs', 'training_programs.program_id', '=', 'exams.program_id')
        ->join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
        ->join('courses', 'courses.program_id', '=', 'training_programs.program_id')
        ->where('courses.facilitator_id', '=', $facilitator_id)->get();

        return view('facilitator.assessments.index')
        ->with('exams', $exams);
    }

    
    public function detail($id)
    {
        $exam = Exam::join('training_programs', 'training_programs.program_id', '=', 'exams.program_id')
        ->join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
        ->join('courses', 'courses.program_id', '=', 'training_programs.program_id')
        ->where('exams.exam_id', '=', $id)->first();

        $participations = Participation::join('exams', 'exams.exam_id', '=', 'participations.exam_id')
        ->join('users', 'users.id', '=', 'participations.user_id')
        ->select('participations.*', 'users.firstname', 'users.lastname')
        ->where('exams.exam_id', '=', $id)
        ->get();

        return view('facilitator.assessments.detail')
        ->with('exam', $exam)
        ->with('participations', $participations);
    }

    
    public function participation_detail($id)
    {
        $participation = Participation::join('users', 'users.id', '=', 'participations.user_id')
        ->select('participations.*', 'users.firstname', 'users.lastname','users.email', 'users.phone', 'users.profile_pic')
        ->where('participations.id', '=', $id)
        ->first();

        $exam = Exam::where('exam_id', $participation->exam_id)->first();

        $answers = Answer::join('questions', 'questions.question_id', '=', 'answers.question_id')
        ->where('answers.participation_id', '=', $id)
        ->get();
        
        if($exam->exam_type == 'multiple choice') {
            return view('facilitator.assessments.participation_detail_obj')
            ->with('participation', $participation)
            ->with('exam', $exam)
            ->with('answers', $answers);
        }
        else {
            return view('facilitator.assessments.participation_detail_essay')
            ->with('participation', $participation)
            ->with('exam', $exam)
            ->with('answers', $answers);
        }
    }

    
    public function export_participation($id) {
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

        return view('facilitator.assessment.grade_essay')
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

        return redirect()->route('facilitator.assessment.detail', ['id' => $participation_id]);
    }

    
}
