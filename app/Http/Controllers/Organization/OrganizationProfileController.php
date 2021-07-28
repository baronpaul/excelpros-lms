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

class OrganizationProfileController extends Controller
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

        return view('organization.profile.index')
        ->with('organization', $organization);
    }

    
    public function edit()
    {
        $org_id = Auth::guard('organization')->id();

        $organization = Organization::where('org_id', $org_id)->first();

        return view('organization.profile.edit')
        ->with('organization', $organization);
    }

    
    public function update(Request $request)
    {
        $org_id = Auth::guard('organization')->id();
        $organization = Organization::where('org_id', $org_id)->first();

        $organization->org_name = $request->org_name;
        $organization->slug = str_slug($request->org_name);
        $organization->email = $request->email;
        $organization->phone = $request->phone;
        $organization->contact_person = $request->contact_person;
        $organization->address = $request->address;
        $organization->save();

        Session::flash('success', 'You have successfully updated your profile');
        return redirect()->route('organization.profile.index');
    }

    
    public function change_password()
    {
        $org_id = Auth::guard('organization')->id();
        $organization = Organization::where('org_id', $org_id)->first();

        return view('organization.profile.change_password')
        ->with('organization', $organization);
    }

    
    public function update_password(Request $request)
    {
        $org_id = Auth::guard('organization')->id();
        $organization = Organization::where('org_id', $org_id)->first();

        $organization->password = bcrypt($request->password);
        $organization->save();

        Session::flash('success', 'You have successfully updated your password');
        return redirect()->route('organization.profile.index');
    }


}
