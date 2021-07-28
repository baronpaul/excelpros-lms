<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

use Session;

use Carbon\Carbon;

use App\Course;

use App\CourseMaterial;

use App\TrainingProgram;

use App\Organization;

use App\Facilitator;

use App\Participant;

use App\User;

class CoursesController extends Controller
{
    
    public function index()
    {
        $user_id = Auth::user()->id;
        $participant = User::where('id', $user_id)->first();

        $program_id = $participant->program_id;

        $training_program = TrainingProgram::where('program_id', $program_id)->first();

        $organization = Organization::where('org_id', $training_program->org_id)->first();
        
        $courses = Course::join('facilitators', 'facilitators.id', '=', 'courses.facilitator_id')
        ->where('courses.program_id', '=', $program_id)
        ->get();

        return view('courses.index')
        ->with('organization', $organization)
        ->with('training_program', $training_program)
        ->with('courses', $courses);
    }

    public function materials()
    {
        $user_id = Auth::user()->id;

        $participant = User::where('id', $user_id)->first();

        $program_id = $participant->program_id;

        $training_program = TrainingProgram::where('program_id', $program_id)->first();
        
        $organization = Organization::where('org_id', $training_program->org_id)->first();

        $course_materials = CourseMaterial::join('training_programs', 'training_programs.program_id', '=', 'course_materials.program_id')
        ->join('users', 'users.program_id','=', 'training_programs.program_id')
        ->where('users.id', '=', $user_id)->get();

        return view('courses.materials')
        ->with('organization', $organization)
        ->with('training_program', $training_program)
        ->with('course_materials', $course_materials);
    }


    public function facilitator($url) {
        $user_id = Auth::user()->id;
        
        $participant = User::where('id', $user_id)->first();
        
        $program_id = $participant->program_id;

        $facilitator = Course::join('facilitators', 'facilitators.id', '=', 'courses.facilitator_id')
        ->where('courses.program_id', '=', $program_id)
        ->where('facilitators.url', '=', $url)->first();

        return view('courses.facilitator')
        ->with('facilitator', $facilitator);
    }

    
    public function detail($url)
    {
        $course = Course::join('facilitators', 'facilitators.id', '=', 'courses.course_id')
        ->where('courses.course_slug', $url)->first();

        $course_materials = CourseMaterial::where('course_id', $course->course_id)->get();

        return view('courses.detail')->with('course', $course)
        ->with('course_materials', $course_materials);
    }

    
}
