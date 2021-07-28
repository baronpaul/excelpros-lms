<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use Session;

use Mail;

use App\Admin;

use App\Permission;

class PortalAdminController extends Controller
{
   
protected $redirectTo = '/admin/login';


public function __construct()
{
    $this->middleware('admin.auth:admin');
}

public function index()
{
    $admins = Admin::join('permissions', 'permissions.permission_id', '=', 'admins.permission')->get();

    return view('admin.portal_admins.index')
    ->with('admins', $admins)
    ;
}


public function create()
{
    $permissions = Permission::all();
    return view('admin.portal_admins.create')->with('permissions', $permissions);
}


public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:admins',
    ]);

    $password = str_random(8);

    $admin = Admin::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($password),
        'permission' => $request->permission
    ]);
    
    //send email to admin
    $data['email'] = $request->email;
    $data['sender_email'] = 'training@averti.com.ng';
    $data['sender_name'] = 'Averti';

    if(Mail::send('email.admin_account_created',
    array(
        'subject' => 'You are now an admin on Informed LMS',
        'recipient_name' => $request->name,
        'recipient_email' => $request->email,
        'recipient_password' => $password
    ), 
    function($message) use ($data) {
        $message->from($data['sender_email'], $data['sender_name']);
        $message->to($data['email'])
        ->subject('You are now an admin on Informed LMS');
    })) {
        Session::flash('success', 'You have successfully added an admin');
        return redirect()->route('admin.portal_admins.index');
    }
    else {
        Session::flash('success', 'You have successfully added an admin. However the welcome email was not sent.');
        return redirect()->route('admin.portal_admins.index');
    }
}


public function edit($id)
{
    $permissions = Permission::all();
    $admin = Admin::find($id);
    return view('admin.portal_admins.edit')
        ->with('admin', $admin)->with('permissions', $permissions);
}


public function update(Request $request, $id)
{
    $this->validate($request, [
        'name' => 'required',
    ]);

    $admin_id = $request->id;
    $admin = Admin::where('id', $admin_id)->first();
    $admin->name = $request->name;
    $admin->permission = $request->permission;
    $admin->save();

    Session::flash('success', 'You have successfully edited the admin');
    return redirect()->route('admin.portal_admins.index');
}


public function change_password($id) {
    $admin = Admin::find($id);
    return view('admin.portal_admins.change_password')
        ->with('admin', $admin);
}


public function update_password(Request $request)
{
    $this->validate($request, [
        'password' => 'required'
    ]);

    $admin = Admin::where('id', $request->id)->first();
    //dd($admin);
    $password = $request->password;
    $admin->password = bcrypt($request->password);
    $admin->save();

    $data['email'] = $admin->email;
    $data['sender_email'] = 'training@averti.com.ng';
    $data['sender_name'] = 'Averti';

    if(Mail::send('email.admin_password_reset',
    array(
        'subject' => 'Your password was reset by the admin',
        'recipient_name' => $admin->name,
        'recipient_email' => $admin->email,
        'recipient_password' => $password,
        'site_link' => 'http://averti.digitalcognition.com.ng/admin'
    ), 
    function($message) use ($data) {
        $message->from($data['sender_email'], $data['sender_name']);
        $message->to($data['email'])
        ->subject('Your password was reset by the admin');
    })) {
        Session::flash('success', 'You have successfully changed the password');
        return redirect()->route('admin.portal_admins.index');
    }
    else {
        Session::flash('success', 'You have successfully changed the password. However a notification email was not sent.');
        return redirect()->route('admin.portal_admins.index');
    }

}


public function delete($id)
{
    $admin = Admin::where('id', $id)->first();
    return view('admin.portal_admins.delete')->with('admin', $admin);
}


public function destroy(Request $request, $id)
{
    $admin = Admin::where('id', $request->id)->first();
    $admin->delete();

    Session::flash('success', 'You have successfully deleted the admin');
    return redirect()->route('admin.portal_admins.index');
}

public function my_profile()
{
    $id = Auth::guard('admin')->user()->id;
    $admin = Admin::find($id);
    return view('admin.profile.index')
        ->with('admin', $admin);
}

public function change_my_password()
{
    $id = Auth::guard('admin')->user()->id;
    $admin = Admin::find($id);
    return view('admin.portal_admins.change_password')
        ->with('admin', $admin);
}


public function update_my_password(Request $request)
{
    $this->validate($request, [
        'password' => 'required',
        'confirm_password' => 'required'
    ]);

    $admin = Admin::where('id', $request->id)->first();
    $admin->password = bcrypt($request->password);
    $admin->save();
    Session::flash('success', 'You have successfully changed the password');
    return redirect()->route('admin.portal_admins.index');
}


}
