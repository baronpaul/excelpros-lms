<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

use Session;

use Image;

use Mail;

use App\Organization;

use App\TrainingProgram;

class AdminOrganizationsController extends Controller
{
    
protected $redirectTo = '/admin/login';


public function __construct()
{
    $this->middleware('admin.auth:admin');
}


public function index()
{
    $organizations = Organization::all();

    return view('admin.organizations.index')
    ->with('organizations', $organizations);
}


public function create()
{
    return view('admin.organizations.create');
}


public function store(Request $request)
{
    $this->validate($request, [
        'org_name' => 'required',
        'email' => 'required|email|max:255'
    ]);

    $password = str_random(8);

    $organization = new Organization;
    $organization->org_name = $request->org_name;
    $organization->slug = str_slug($request->org_name);
    $organization->email = $request->email;
    $organization->address = $request->address;
    $organization->phone = $request->phone;
    $organization->contact_person = $request->contact_person;
    $organization->password = bcrypt($password);
    $organization->status = 'active';
    if($request->hasFile('logo')) {
        $file = $request->logo;
        $newImageName = 'uploads/'.time().$file->getClientOriginalName();
        $img = Image::make($file)->orientate()
        ->fit(500, 500, function ($constraint) {
            $constraint->upsize();
        })
        ->save($newImageName, 60);
        $organization->logo = $newImageName;
    }
    $organization->save();

    //Session::flash('success', 'You have successfully created an organization');
    //return redirect()->route('admin.organizations.index');

    //send email to user
    $data['email'] = $request->email;
    $data['sender_email'] = 'training@excelpros-test.i.ng';
    $data['sender_name'] = 'ExcelPros';

    if(Mail::send('email.organization_account_created',
    array(
        'subject' => 'Your ExcelPros LMS Account is Live',
        'org_name' => $request->org_name,
        'recipient_name' => $request->contact_person,
        'recipient_email' => $request->email,
        'recipient_password' => $password
    ), 
    function($message) use ($data) {
        $message->from($data['sender_email'], $data['sender_name']);
        $message->to($data['email'])
        ->subject('Your ExcelPros LMS Account is Live');
    })) {
        Session::flash('success', 'You have successfully created an organization');
        return redirect()->route('admin.organizations.index');
    }
    else {
        Session::flash('success', 'You have successfully created an organization, however a welcome email was not sent to the contact person');
        return redirect()->route('admin.organizations.index');
    }

}


public function detail($id)
{
    $organization = Organization::where('org_id', $id)->first();
    $training_programs = TrainingProgram::where('org_id', $id)->get();

    return view('admin.organizations.detail')
    ->with('organization', $organization)
    ->with('training_programs', $training_programs);
}


public function edit($id)
{
    $organization = Organization::where('org_id', $id)->first();

    return view('admin.organizations.edit')
    ->with('organization', $organization);
}


public function update(Request $request)
{
    $this->validate($request, [
        'org_name' => 'required',
        'email' => 'required|email|max:255',
    ]);

    $organization = Organization::where('org_id', $request->org_id)->first();

    $organization->org_name = $request->org_name;
    $organization->slug = str_slug($request->org_name);
    $organization->email = $request->email;
    $organization->address = $request->address;
    $organization->phone = $request->phone;
    $organization->contact_person = $request->contact_person;
    $organization->status = $request->status;
    if($request->hasFile('logo')) {
        $file = $request->logo;
        $newImageName = 'uploads/'.time().$file->getClientOriginalName();
        $img = Image::make($file)->orientate()
        ->fit(500, 500, function ($constraint) {
            $constraint->upsize();
        })
        ->save($newImageName, 60);
        $organization->logo = $newImageName;
    }
    $organization->save();

    Session::flash('success', 'You have successfully updated the organization');
    return redirect()->route('admin.organizations.index');
}


public function change_logo($id)
{
    $organization = Organization::where('org_id', $id)->first();

    return view('admin.organizations.change_logo')
    ->with('organization', $organization);
}


public function update_logo(Request $request)
{
    $this->validate($request, [
        'logo' => 'required'
    ]);

    $organization = Organization::where('org_id', $request->org_id)->first();

    $file = $request->logo;
    $newImageName = 'uploads/'.time().$file->getClientOriginalName();
    $img = Image::make($file)->orientate()->save($newImageName, 60);
    $organization->logo = $newImageName;

    $organization->save();

    Session::flash('success', 'You have successfully updated the organization logo');
    return redirect()->route('admin.organizations.index');
}

public function change_password($id)
{
    $organization = Organization::where('org_id', $id)->first();

    return view('admin.organizations.change_password')
    ->with('organization', $organization);
}


public function update_password(Request $request)
{
    $this->validate($request, [
        'password' => 'required'
    ]);

    $organization = Organization::where('org_id', $request->org_id)->first();
    $password = $request->password;
    $organization->password = bcrypt($request->password);
    $organization->save();

    $data['sender_email'] = 'training@averti.com.ng';
    $data['sender_name'] = 'Averti PM';
    $data['email'] = $organization->email;

    Mail::send('email.organization_password_reset',
    array(
        'subject' => 'Your Password Was Reset',
        'recipient_name' => $organization->contact_person,
        'recipient_email' => $organization->email,
        'recipient_password' => $password,
        'site_link' => 'http://www.excelpros-test.i.ng/organization'
    ), 
    function($message) use ($data) {
        $message->from($data['sender_email'], $data['sender_name']);
        $message->to($data['email'])
        ->subject('Your Password Was Reset');
    });

    Session::flash('success', 'You have successfully updated the password');
    return redirect()->route('admin.organizations.index');
}


public function delete($id)
{
    $organization = Organization::where('org_id', $id)->first();

    return view('admin.organizations.delete')
    ->with('organization', $organization);
}


public function destroy(Request $request)
{
    $organization = Organization::where('org_id', $request->org_id)->first();
    $organization->delete();

    Session::flash('success', 'You have successfully deleted an organization');
    return redirect()->route('admin.organizations.index');
}

    
}
