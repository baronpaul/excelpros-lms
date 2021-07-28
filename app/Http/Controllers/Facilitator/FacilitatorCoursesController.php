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

class FacilitatorCoursesController extends Controller
{
    protected $redirectTo = '/facilitator/login';
    
    
    public function __construct()
    {
        $this->middleware('facilitator.auth:facilitator');
    }


    public function index()
    {
        $facilitator_id = Auth::guard('facilitator')->id();

        $courses = Course::join('training_programs', 'training_programs.program_id', '=', 'courses.program_id')
        ->join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
        ->where('courses.facilitator_id', '=', $facilitator_id)
        ->get();

        return view('facilitator.courses.index')
        ->with('courses', $courses);
    }

    
    public function detail($id)
    {
        $facilitator_id = Auth::guard('facilitator')->id();

        $course = Course::join('training_programs', 'training_programs.program_id', '=', 'courses.program_id')
        ->join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
        ->where('courses.course_id', '=', $id)
        ->first();

        $course_materials = CourseMaterial::join('training_programs', 'training_programs.program_id', '=', 'course_materials.program_id')
        ->where('training_programs.program_id', '=', $course->program_id)->get();

        return view('facilitator.courses.detail')
        ->with('course', $course)
        ->with('course_materials', $course_materials);
    }

    
    public function destroy($id)
    {
        //
    }
}
