<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

use Session;

use Excel;

use Mail;

use PDF;

use App\Company;

use App\Job;

use App\Application;

use App\User;

use App\TrainingProgram;

use App\Participant;

use App\CertificateTemplate;

use App\CertificateIssuance;

use App\Organization;

class AdminUsersController extends Controller
{
protected $redirectTo = '/admin/login';


public function __construct()
{
    $this->middleware('admin.auth:admin');
}

public function index()
{
    $users = User::join('training_programs', 'training_programs.program_id', 'users.program_id')->get();
    
    $orgs = Organization::all();

    return view('admin.users.index')
    ->with('orgs', $orgs)
    ->with('users', $users);
}


public function participants($id) {
    $users = User::join('training_programs', 'training_programs.program_id', 'users.program_id')
    ->join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
    ->where('organizations.org_id', '=', $id)
    ->select('users.*', 'training_programs.program_name', 'organizations.org_name')
    ->get();

    $organization = Organization::where('org_id', $id)->first();

    return view('admin.users.participants')
    ->with('users', $users)
    ->with('organization', $organization);
}


public function create() {
    $training_programs = TrainingProgram::join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
    ->get();
    return view('admin.users.create')->with('training_programs', $training_programs);
}


public function store(Request $request)
{
    /*
        $this->validate($request, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
        ]);
    */

    $password = str_random(8);

    $user = new User;
    
    $user->firstname = $request->firstname;
    $user->lastname = $request->lastname;
    $user->email = $request->email;
    //$user->password = bcrypt($request->password);
    $user->password = bcrypt($password);
    $user->phone = $request->phone;
    $user->program_id = $request->program_id;
    $user->save();

    //send email to user
    $data['email'] = $request->email;
    $data['sender_email'] = 'training@excelpros.test.i.ng';
    $data['sender_name'] = 'ExcelProsLMS';

    if(Mail::send('email.account_created',
    array(
        'subject' => 'Your ExcelProsLMS Account is Live',
        'recipient_name' => $request->firstname,
        'recipient_email' => $request->email,
        'recipient_password' => $password
    ), 
    function($message) use ($data) {
        $message->from($data['sender_email'], $data['sender_name']);
        $message->to($data['email'])
        ->subject('Your ExcelProsLMS Account is Live');
    })) {
        Session::flash('success', 'You have successfully added a user');
        return redirect()->route('admin.training_programs.detail', ['id' => $request->program_id]);
    }
    else {
        Session::flash('success', 'You have successfully added a user, however a welcome email was not sent to the user');
        return redirect()->route('admin.training_programs.detail', ['id' => $request->program_id]);
    }

}


public function upload_users() {
    $training_programs = TrainingProgram::join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
    ->get();

    return view('admin.users.upload_users')
    ->with('training_programs', $training_programs);
}


public function do_upload_users(Request $request) {
    $this->validate($request, [
        'uploaded_file' => 'required'
    ]);

    $program_id = $request->program_id;
    
    $path = $request->file('uploaded_file')->getRealPath();
    //dd($path);
    
    $data = Excel::load($path)->get();
    if($data->count() > 0) {
        foreach($data->toArray() as $key => $value) {
            $password = str_random(8);
            $insert_data[] = [
                'program_id' => $program_id,
                'firstname' => $value['firstname'],
                'lastname' => $value['lastname'],
                'email' => $value['email'],
                'phone' => $value['phone'],
                'password' => $password
            ];
        }
        if(!empty($insert_data)) {
            //DB::table('users')->insert($insert_data);
            for($i = 0; $i < count($insert_data); $i++) {
                $user = new User;
                $user->program_id = $insert_data[$i]['program_id'];
                $user->firstname = $insert_data[$i]['firstname'];
                $user->lastname = $insert_data[$i]['lastname'];
                $user->email = $insert_data[$i]['email'];
                $user->phone = $insert_data[$i]['phone'];
                $user->password = bcrypt($insert_data[$i]['password']);
                $user->save();

                $data['email'] = $insert_data[$i]['email'];
                $data['sender_email'] = 'training@excelpros-test.i.ng';
                $data['sender_name'] = 'ExcelprosLMS';

                Mail::send('email.account_created',
                array(
                    'subject' => 'Your ExcelprosLMS Account is Live',
                    'recipient_name' => $insert_data[$i]['firstname'],
                    'recipient_email' => $insert_data[$i]['email'],
                    'recipient_password' => $insert_data[$i]['password']
                ), 
                function($message) use ($data) {
                    $message->from($data['sender_email'], $data['sender_name']);
                    $message->to($data['email'])
                    ->subject('Your ExcelprosLMS Account is Live');
                });
            }

        }
    }
    Session::flash('success', 'You have successfully uploaded multiple users to the platform');
    return redirect()->route('admin.training_programs.detail', ['id' => $program_id]);

}


public function view($id)
{
    $user = User::join('training_programs', 'training_programs.program_id', 'users.program_id')
    ->where('users.id','=', $id)->first();

    return view('admin.users.view')
    ->with('user', $user);
}


public function edit($id)
{
    $user = User::where('users.id', $id)->first();

    $training_programs = TrainingProgram::join('organizations', 'organizations.org_id', '=', 'training_programs.org_id')
    ->get();

    return view('admin.users.edit')
    ->with('user', $user)
    ->with('training_programs', $training_programs);
}


public function update(Request $request)
{
    $user_id = $request->user_id;
    $user = User::where('id', $user_id)->first(); 
    $user->firstname = $request->firstname;
    $user->lastname = $request->lastname;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->program_id = $request->program_id;
    $user->save();
    
    Session::flash('success', 'You have successfully updated a user profile');
    return redirect()->route('admin.users.index');
}


public function change_status($id) {
    $user = User::where('id', $id)->first();

    $training_program = TrainingProgram::join('users', 'training_programs.program_id', '=', 'users.program_id')
    ->where('users.id', '=', $id)->first();

    return view('admin.users.change_status')
    ->with('user', $user)
    ->with('training_program', $training_program);
}


public function update_status(Request $request) {
    $program_id = $request->program_id;
    $user = User::where('id', $request->user_id)->first();
    $user->user_status = $request->status;
    $user->save();

    Session::flash('success', 'You have successfully updated a user status');
    return redirect()->route('admin.training_programs.participants', ['id' => $program_id]);
}


public function certificates($id) {
    $participant = User::where('users.id', $id)->first();

    $training_program = TrainingProgram::join('users', 'training_programs.program_id', '=', 'users.program_id')
    ->where('users.id', '=', $id)->first();

    $certificate = CertificateTemplate::join('training_programs', 'training_programs.program_id', '=', 'certificate_templates.program_id')
    ->where('training_programs.program_id', '=', $training_program->program_id)
    ->first();

    $certificate_issuance = CertificateIssuance::where('participant_id', $id)->first();

    //dd($training_program);

    return view('admin.users.certificates')
    ->with('participant', $participant)
    ->with('training_program', $training_program)
    ->with('certificate', $certificate)
    ->with('certificate_issuance', $certificate_issuance);
}


public function issue_certificate(Request $request) {
    $program_id = $request->program_id;
    
    $participant_id = $request->participant_id;

    $certificate_id = $request->certificate_id;
    
    $certificate = CertificateTemplate::join('training_programs', 'training_programs.program_id', '=', 'certificate_templates.program_id')
    ->where('certificate_templates.certificate_id', '=', $certificate_id)->first();

    $certificate_issuance = new CertificateIssuance;
    $certificate_issuance->certificate_id = $certificate_id;
    $certificate_issuance->program_id = $program_id;
    $certificate_issuance->participant_id = $participant_id;
    $certificate_issuance->issue_date = date('Y-m-d');

    $certificate_issuance->save();
    
    Session::flash('success', 'You have generated a certificate for the participant');
    return redirect()->route('admin.users.certificates', ['id' => $participant_id]);
}


public function download_certificate($id) {
    
    $certificate_issuance = CertificateIssuance::where('issue_id', $id)->first();

    $certificate = CertificateTemplate::where('certificate_id', $certificate_issuance->certificate_id)->first();

    $user_id = $certificate_issuance->participant_id;

    $user = User::where('id', $user_id)->first();

    $user_name = $user->firstname .' '.$user->lastname;

    $program_id = $certificate_issuance->program_id;
    $program = TrainingProgram::join('organizations', 'organizations.org_id', 'training_programs.program_id')
    ->where('training_programs.program_id', '=', $program_id)->first();

    //generate pdf certificate
    $filename = 'Averti-certificate-'.$user->firstname;
    $title = 'Certificate for '.$user->firstname;

    if($certificate->style == 'standard') {
        $certificate_design = 'admin.users.certificate_template';
    }
    elseif($certificate->style == 'custom-left') {
        $certificate_design = 'admin.users.certificate_template_custom_left';
    }
    elseif($certificate->style == 'custom-right') {
        $certificate_design = 'admin.users.certificate_template_custom_right';
    }
    else {
        $certificate_design = 'admin.users.certificate_template';
    }

    $pdf = PDF::loadView($certificate_design,
    ['title' => $title, 'recipient_name' => $user_name, 'program_name' => $program->program_name, 'program_date' => $program->end_date])
    ->setPaper('a4', 'landscape');

    return $pdf->download($filename.'.pdf');
}


public function send_certificate($id) {
    
    $certificate_issuance = CertificateIssuance::where('issue_id', $id)->first();

    $certificate = CertificateTemplate::where('certificate_id', $certificate_issuance->certificate_id)->first();

    $user_id = $certificate_issuance->participant_id;

    $user = User::where('id', $user_id)->first();

    $user_name = $user->firstname .' '.$user->lastname;

    $program_id = $certificate_issuance->program_id;
    $program = TrainingProgram::join('organizations', 'organizations.org_id', 'training_programs.program_id')
    ->where('training_programs.program_id', '=', $program_id)->first();

    //generate pdf certificate
    $filename = 'Averti-certificate-'.$user->firstname;
    $title = 'Certificate for '.$user->firstname;

    if($certificate->style == 'standard') {
        $certificate_design = 'admin.users.certificate_template';
    }
    elseif($certificate->style == 'custom-left') {
        $certificate_design = 'admin.users.certificate_template_custom_left';
    }
    elseif($certificate->style == 'custom-right') {
        $certificate_design = 'admin.users.certificate_template_custom_right';
    }
    else {
        $certificate_design = 'admin.users.certificate_template';
    }

    $pdf = PDF::loadView($certificate_design,
    ['title' => $title, 'recipient_name' => $user_name, 'program_name' => $program->program_name, 'program_date' => $program->end_date])
    ->setPaper('a4', 'landscape');

    //send email to user
    $data['sender_email'] = 'training@averti.com.ng';
    $data['sender_name'] = 'Averti PM';
    $data['email'] = $user->email;
    $data['subject'] = 'Your Certificate Has Arrived';
    $data['filename'] = $filename;
    $data['pdf'] = $pdf;

    if(Mail::send(
        'email.send_certificate',
        array(
            'subject' => 'Your Certificate Has Arrived',
            'name' => $user_name,
            'program_name' => $program->program_name,
        ),
        function ($message) use ($data) {
            $message->from('training@averti.com.ng', 'Averti PM');
            $message->to($data['email'])->subject('Your Certificate Has Arrived');
            //$message->attachData($data['pdf']->output(), $data['filename'].'.pdf');
        }
    )){
        Session::flash('success', 'Certificate has been sent to the participant');
        return redirect()->route('admin.users.certificates', ['id' => $user_id]);
    }
    else {
        Session::flash('success', 'The certificate was not sent');
        return redirect()->route('admin.users.certificates', ['id' => $user_id]);
    }

}



public function change_password($id)
{
    $user = User::where('users.id', $id)->first();

    return view('admin.users.change_password')
    ->with('user', $user);
}


public function update_password(Request $request)
{
    $user_id = $request->user_id;
    $user = User::where('id', $user_id)->first(); 
    $user->password = bcrypt($request->new_password);
    $user->save();
    $password = $request->new_password;

    //send email to user
    $data['sender_email'] = 'training@averti.com.ng';
    $data['sender_name'] = 'Averti PM';
    $data['email'] = $user->email;
    
    Mail::send('email.user_password_reset',
    array(
        'subject' => 'Your Password Was Reset',
        'recipient_name' => $user->firstname,
        'recipient_email' => $user->email,
        'recipient_password' => $password,
        'site_link' => 'http://www.informedlms.com'
    ), 
    function($message) use ($data) {
        $message->from($data['sender_email'], $data['sender_name']);
        $message->to($data['email'])
        ->subject('Your Password Was Reset');
    });

    Session::flash('success', 'You have successfully updated a user password');
    return redirect()->route('admin.users.index');

}

public function edit_picture($id) {
    $user = User::where('id', $id)->first();
    return view('admin.users.edit_picture')
    ->with('user', $user);
}


public function update_picture(Request $request) {
    $user_id = $request->user_id;
    $user = User::where('users.id', $user_id)->first();

    $profile_pic = $request->profile_pic;
    $profile_pic_new_name = time() . $profile_pic->getClientOriginalName();
    $profile_pic->move('uploads/profile/', $profile_pic_new_name);

    $user->profile_pic = 'uploads/profile/' . $profile_pic_new_name;
    $user->save();

    Session::flash('success', 'You have successfully updated a user profile');
    return redirect()->route('admin.users.view', ['id' => $user_id]);
}


public function suspend($id)
{
    $user = User::where('id', $id)->first();

    return view('admin.users.suspend')
    ->with('user', $user);
}

public function do_suspend(Request $request)
{
    $user = User::where('id',$request->user_id)->first();
    $user->user_status = 'suspended';
    $user->save();

    Session::flash('success', 'You have successfully suspended the user account');
    return redirect()->route('admin.users.index');
}


public function unsuspend($id)
{
    $user = User::where('id', $id)->first();

    return view('admin.users.suspend')
    ->with('user', $user);
}


public function do_unsuspend(Request $request)
{
    $user = User::where('id',$request->user_id)->first();
    $user->user_status = 'started';
    $user->save();

    Session::flash('success', 'You have successfully suspended the user account');
    return redirect()->route('admin.users.index');
}


public function export_excel() {
    $users = User::join('states', 'states.id', '=', 'users.state_id')->select('users.firstname', 'users.lastname', 'users.email', 'users.address', 
    'states.state_name')->get();

    $usersArray = [];

    $usersArray[] = ['Firstname', 'Lastname', 'Email', 'Address', 'State'];

    foreach($users as $user) {
        $usersArray[] = $user->toArray();
    }
    $filename = 'users-'.time();

    Excel::create($filename, function($excel) use($usersArray) {
        $excel->setTitle('Registered Users');
        $excel->setCreator('Averti')->setCompany('InformedLMS by Averti PM');
        $excel->setDescription('Data of registered users');
        $excel->sheet('Sheet 1', function($sheet) use($usersArray) {
            $sheet->fromArray($usersArray, null, 'A1', false, false);
        });
    })->download('xlsx');
}


public function delete($id)
{
    $user = User::where('id', $id)->first();

    return view('admin.users.delete')
    ->with('user', $user);
}


public function destroy(Request $request)
{
    
    $user = User::where('id', $request->user_id)->first();
    
    $user->delete();

    Session::flash('success', 'You have successfully deleted a user profile');
    return redirect()->route('admin.users.index');
}


}
