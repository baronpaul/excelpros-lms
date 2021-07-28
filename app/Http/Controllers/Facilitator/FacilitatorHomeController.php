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

use App\Exam;

use App\Facilitator;


class FacilitatorHomeController extends Controller
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
        
        return view('facilitator.home')
        ->with('courses', $courses);
    }

    
}
