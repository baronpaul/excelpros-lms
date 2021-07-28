<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

use Session;

use App\User;

use App\Participant;

use App\TrainingProgram;

use App\Organization;

class HomeController extends Controller
{
protected $page_class;

public function __construct()
{
    //$this->middleware('auth');
    $this->page_class = 'home';
}


public function index()
{
    
    if(null != Auth::user()) {
        $user_id = Auth::user()->id;
        $participant = User::where('id', $user_id)->first();

        $training_program = TrainingProgram::where('program_id', $participant->program_id)->first();
        
        $organization = Organization::where('org_id', $training_program->org_id)->first();
    
        return view('home')
        ->with('organization', $organization)
        ->with('training_program', $training_program);
    }
    else {
        return view('home');
    }
    
    
}

   
}
