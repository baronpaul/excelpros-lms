<?php

namespace App\Http\Controllers\Facilitator;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use Session;

use App\Organization;

use App\TrainingProgram;

use App\Course;

use App\CourseMaterial;

use App\Exam;

use App\Facilitator;

use App\FacilitatorEvaluation;


class FacilitatorEvaluationController extends Controller
{
    protected $redirectTo = '/facilitator/login';
    
    
    public function __construct()
    {
        $this->middleware('facilitator.auth:facilitator');
    }


    public function index()
    {
        $facilitator_id = Auth::guard('facilitator')->id();

        $training_programs = TrainingProgram::join('courses', 'courses.program_id', '=', 'training_programs.program_id')
        ->where('courses.facilitator_id', '=', $facilitator_id)->get();

        return view('facilitator.evaluations.index')
        ->with('training_programs', $training_programs);
    }

   
    public function detail($id)
    {
        $facilitator_id = Auth::guard('facilitator')->id();

        $training_program = TrainingProgram::join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
        ->where('training_programs.program_id', '=', $id)->first();

        $course = Course::where('program_id', $id)->where('facilitator_id', $facilitator_id)->first();

        $evaluations = FacilitatorEvaluation::join('users', 'users.id', '=', 'facilitator_evaluations.user_id')
        ->where('facilitator_evaluations.program_id', '=', $id)
        ->where('facilitator_evaluations.facilitator_id', '=', $facilitator_id)
        ->get();

        return view('facilitator.evaluations.detail')
        ->with('evaluations', $evaluations)
        ->with('training_program', $training_program)
        ->with('course', $course);
    }

    
    public function participant($id)
    {
        $facilitator_id = Auth::guard('facilitator')->id();

        $evaluation = FacilitatorEvaluation::join('training_programs', 'training_programs.program_id', '=', 'facilitator_evaluations.program_id')
        ->join('users', 'users.id','=','facilitator_evaluations.user_id')
        ->where('facilitator_evaluations.id', '=', $id)
        ->select('facilitator_evaluations.*', 'users.firstname', 'users.lastname', 'users.id as user_id', 'facilitators.name', 'training_programs.*')
        ->first();

        $training_program = TrainingProgram::where('program_id', $evaluation->program_id)->first();

        return view('facilitator.evaluations.participant')
        ->with('evaluation', $evaluation)
        ->with('training_program', $training_program);
    }

    
}
