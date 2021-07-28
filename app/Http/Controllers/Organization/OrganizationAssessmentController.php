<?php

namespace App\Http\Controllers\Organization;

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

use App\Participation;

use App\Answer;

use App\Question;

use App\Facilitator;

use App\User;

class OrganizationAssessmentController extends Controller
{
    protected $redirectTo = '/organization/login';

    
    public function __construct()
    {
        $this->middleware('organization.auth:organization');
    }


    public function index()
    {
        $org_id = Auth::guard('organization')->id();
        $organization = Organization::where('org_id', $org_id)->first();

        $exams = Exam::join('training_programs', 'training_programs.program_id', '=', 'exams.program_id')
        ->join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
        ->where('organizations.org_id', '=', $org_id)->get();

        return view('organization.assessments.index')
        ->with('exams', $exams)
        ->with('organization', $organization);
    }

    
    public function detail($id)
    {
        $exam = Exam::join('training_programs', 'training_programs.program_id', '=', 'exams.program_id')
        ->join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
        //->join('courses', 'courses.program_id', '=', 'training_programs.program_id')
        ->where('exams.exam_id', '=', $id)->first();

        //dd($exam);

        $participations = Participation::join('exams', 'exams.exam_id', '=', 'participations.exam_id')
        ->join('users', 'users.id', '=', 'participations.user_id')
        ->select('participations.*', 'users.firstname', 'users.lastname')
        ->where('exams.exam_id', '=', $id)
        ->get();

        return view('organization.assessments.detail')
        ->with('exam', $exam)
        ->with('participations', $participations);
    }


    public function questions($id) 
    {
        $exam = Exam::join('training_programs', 'training_programs.program_id', '=', 'exams.program_id')
        ->join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
        ->where('exams.exam_id', '=', $id)->first();

        $collection_id = $exam->collection_id;

        $questions = Question::join('collections', 'collections.collection_id', '=', 'questions.collection_id')
        ->where('questions.collection_id', '=', $collection_id)
        ->get();

        return view('organization.assessments.questions')
        ->with('exam', $exam)
        ->with('questions', $questions);
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
            return view('organization.assessments.participation_detail_obj')
            ->with('participation', $participation)
            ->with('exam', $exam)
            ->with('answers', $answers);
        }
        else {
            return view('organization.assessments.participation_detail_essay')
            ->with('participation', $participation)
            ->with('exam', $exam)
            ->with('answers', $answers);
        }
    }

    
    public function export_participation($id)
    {
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

    
}
