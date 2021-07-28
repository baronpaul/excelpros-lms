<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

use Session;

use Excel;

use App\Organizaton;

use App\TrainingProgram;

use App\Course;

use App\CourseMaterial;

use App\Facilitator;

use App\Exam;

use App\User;

use App\Assignment;

class AdminCoursesController extends Controller
{
    
    protected $redirectTo = '/admin/login';
    
    
    public function index() {
        $courses = Course::join('training_programs', 'training_programs.program_id', '=', 'courses.program_id')
        ->join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
        ->join('facilitators', 'facilitators.id', '=', 'courses.facilitator_id')
        ->get();
        return view('admin.courses.index')->with('courses', $courses);
    }

    public function create($id)
    {
        $facilitators = Facilitator::all();
        $training_program = TrainingProgram::where('program_id', $id)->first();

        return view('admin.courses.create')
        ->with('training_program', $training_program)
        ->with('facilitators', $facilitators);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'program_id' => 'required'
        ]);

        $program_id = $request->program_id;

        $facilitator_ids = $request->facilitator_id;
        $course_names = $request->course_name;
        $days = $request->day;

        for($i=0;$i<count($facilitator_ids);$i++){
            $course = new Course([
            'facilitator_id' => $facilitator_ids[$i],
            'course_name' => $course_names[$i],
            'day' => $days[$i],
            'program_id' => $program_id
            ]);
            $course->save();
        }

        return 'success';
        
        //Session::flash('success', 'You have successfully created modules');
        //return redirect()->route('admin.training_programs.detail', ['id' => $request->program_id]);
    }
    
    public function edit($id)
    {
        $course = Course::join('facilitators', 'facilitators.id', '=', 'courses.facilitator_id')
        ->where('courses.course_id', '=', $id)->first();

        $training_program = TrainingProgram::where('program_id', $course->program_id)->first();

        $facilitators = Facilitator::all();

        return view('admin.courses.edit')
        ->with('course', $course)
        ->with('training_program', $training_program)
        ->with('facilitators', $facilitators);
    }

    
    public function update(Request $request)
    {
        $course = Course::where('course_id', $request->course_id)->first();

        $course->program_id = $request->program_id;
        $course->facilitator_id = $request->facilitator_id;
        $course->course_name = $request->course_name;
        $course->day = $request->day;

        $course->save();

        Session::flash('success', 'You have successfully created a course');
        return redirect()->route('admin.training_programs.detail', ['id' => $request->program_id]);
    }

    
    public function delete($id)
    {
        $course = Course::join('facilitators', 'facilitators.id', '=', 'courses.facilitator_id')
        ->where('courses.course_id', '=', $id)->first();

        return view('admin.courses.delete')
        ->with('course', $course);
    }

    public function destroy(Request $request) {
        $course = Course::where('course_id', $request->course_id)->first();

        $program_id = $course->program_id;
        
        $course->delete();

        Session::flash('success', 'You have successfully deleted a course');
        return redirect()->route('admin.training_programs.detail', ['id' => $program_id]);
    }
}
