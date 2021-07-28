<?php

namespace App\Http\Controllers\Organization;

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

use App\User;

class OrganizationCoursesController extends Controller
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

        $courses = TrainingProgram::join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
        ->where('training_programs.org_id', '=', $org_id)
        ->get();

        return view('organization.courses.index')
        ->with('organization', $organization)
        ->with('courses', $courses);
    }

    
    public function detail($id)
    {
        $org_id = Auth::guard('organization')->id();
        $organization = Organization::where('org_id', $org_id)->first();

        $course = TrainingProgram::where('training_programs.program_id', $id)->first();

        $course_modules = Course::join('facilitators', 'facilitators.id', '=', 'courses.facilitator_id')
        ->where('courses.program_id', '=', $id)->get();

        $course_materials = CourseMaterial::where('program_id', $id)->get();

        return view('organization.courses.detail')
        ->with('organization', $organization)
        ->with('course', $course)
        ->with('course_modules', $course_modules)
        ->with('course_materials', $course_materials);
    }


    public function facilitator($url)
    {
        $org_id = Auth::guard('organization')->id();
        
        $organization = Organization::where('org_id', $org_id)->first();

        $facilitator = Facilitator::where('url', $url)->first();

        return view('organization.courses.facilitator')
        ->with('organization', $organization)
        ->with('facilitator', $facilitator);
    }

    
}
