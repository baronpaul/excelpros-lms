<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

use Session;

use App\Organizaton;

use App\TrainingProgram;

use App\Course;

use App\Facilitator;

use App\Assignment;

use App\AssignmentSubmission;

class AdminAssignmentsController extends Controller
{
    
    protected $redirectTo = '/admin/login';
    
    
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    
    public function create($id)
    {
        $course = Course::where('course_id', $id)->first();
        return view('admin.assignments.create')->with('course', $course);
    }

    
    public function store(Request $request)
    {
        $assignment = new Assignment;
        
        $assignment->course_id = $request->course_id;
        $assignment->title = $request->title;
        $assignment->slug = str_slug($request->title);
        $assignment->details = $request->details;
        $assignment->submission_date = $request->submission_date;

        if($request->hasFile('attachment')) {
            $document_file = $request->attachment;
            $document_file_new_name = time().$document_file->getClientOriginalName();
            $document_file->move('uploads/documents/', $document_file_new_name);
            $assignment->attachments = 'uploads/documents/'.$document_file_new_name;
        }

        $assignment->save();

        Session::flash('success', 'You have successfully created an assignment');
        return redirect()->route('admin.courses.detail', ['id' => $request->course_id]);
    }

    
    public function detail($id)
    {
        $assignment = Assignment::where('assignment_id', $id)->first();
        
        $assignment_submissions = AssignmentSubmission::join('users', 'users.id', '=', 'assignment_submissions.user_id')
        ->where('assignment_id', $id)->get();

        return view('admin.assignments.detail')
        ->with('assignment', $assignment)
        ->with('assignment_submissions', $assignment_submissions);
    }

    
    public function edit($id)
    {
        $assignment = Assignment::join('courses', 'courses.course_id', '=', 'assignments.course_id')
        ->where('assignments.assignment_id', $id)->first();

        return view('admin.assignments.edit')
        ->with('assignment', $assignment);
    }

    
    public function update(Request $request)
    {
        $assignment = Assignment::where('id', $request->assignment_id)->first();

        $assignment->course_id = $request->course_id;
        $assignment->title = $request->title;
        $assignment->slug = str_slug($request->title);
        $assignment->details = $request->details;
        $assignment->submission_date = $request->submission_date;
        
        if($request->hasFile('attachment')) {
            $file = $request->attachment;
            $newImageName = 'uploads/'.time().$file->getClientOriginalName();
            $img = Image::make($file)->orientate()->save($newImageName, 60);
            $assignment->attachments = $newImageName;
        }
        $assignment->save();

        Session::flash('success', 'You have successfully uppdated an assignment');
        return redirect()->route('admin.courses.detail', ['id' => $request->course_id]);
    }

    
    public function delete($id)
    {
        $assignment = Assignment::join('courses', 'courses.course_id', '=', 'assignments.course_id')
        ->where('assignments.assignment_id', $id)->first();

        return view('admin.assignments.delete')
        ->with('assignment', $assignment);
    }

    
    public function destroy(Request $request)
    {
        $assignment = Assignment::where('assignment_id', $request->assignment_id)->first();
        $assignment->delete();

        Session::flash('success', 'You have successfully deleted the assignment');
        return redirect()->route('admin.courses.detail', ['id' => $request->course_id]);
    }
}
