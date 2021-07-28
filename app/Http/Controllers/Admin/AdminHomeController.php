<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

use Session;

use App\Admin;

use App\User;

use App\Organization;

use App\TrainingProgram;

use App\Course;

use App\Exam;

use App\Facilitator;

class AdminHomeController extends Controller
{
    protected $redirectTo = '/admin/login';
    
    
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }


    public function index()
    {
        
        $organizations = Organization::all();
        
        $organizations_count = Organization::count();

        $training_programs = TrainingProgram::join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
        ->get();

        $training_programs_count = TrainingProgram::count();

        $courses = Course::join('training_programs', 'training_programs.program_id', '=', 'courses.program_id')
        ->get();

        $courses_count = Course::count();

        $users = User::orderBy('created_at', 'desc')->take(10)->get();

        $users_count = User::count();

        $facilitators_count = Facilitator::count();
        
        $exams = Exam::join('collections', 'collections.collection_id', '=', 'exams.collection_id')
        ->where('exams.exam_status', '=', 'active')
        ->orderBy('exams.exam_id', 'DESC')
        ->get();

        $exams_count = Exam::count();
        
        return view('admin.home')
        ->with('organizations', $organizations)
        ->with('organizations_count', $organizations_count)
        ->with('training_programs', $training_programs)
        ->with('training_programs_count', $training_programs_count)
        ->with('courses', $courses)
        ->with('courses_count', $courses_count)
        ->with('exams', $exams)
        ->with('exams_count', $exams_count)
        ->with('users', $users)
        ->with('users_count', $users_count)
        ->with('facilitators_count', $facilitators_count);
    }


    public function cms()
    {
        return view('admin.cms');
    }


    
}
