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


class OrganizationHomeController extends Controller
{
    protected $redirectTo = '/organization/login';

    
    public function __construct()
    {
        $this->middleware('organization.auth:organization');
    }


    public function index()
    {
        
        return view('organization.home');
    }

    
}
