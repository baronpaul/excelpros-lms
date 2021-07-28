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

use App\Exam;

use App\Facilitator;

use App\User;

class OrganizationParticipantsController extends Controller
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

        $participants = User::join('training_programs', 'training_programs.program_id', '=', 'users.program_id')
        ->where('training_programs.org_id', '=', $org_id)
        ->orderBy('training_programs.program_name', 'ASC')
        ->get();

        return view('organization.participants.index')
        ->with('organization', $organization)
        ->with('participants', $participants);
    }

    
    public function detail($id)
    {
        $org_id = Auth::guard('organization')->id();
        $organization = Organization::where('org_id', $org_id)->first();

        $participant = User::join('training_programs', 'training_programs.program_id', '=', 'users.program_id')
        ->where('users.id', '=', $id)->first();

        return view('organization.participants.detail')
        ->with('organization', $organization)
        ->with('participant', $participant);
    }

    
}
