<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

use Session;

use Image;

use Excel;

use Mail;

use App\Organizaton;

use App\TrainingProgram;

use App\Course;

use App\Facilitator;


class AdminFacilitatorsController extends Controller
{

    
protected $redirectTo = '/admin/login';


public function __construct()
{
    $this->middleware('admin.auth:admin');
}

public function index()
{
    $facilitators = Facilitator::all();

    return view('admin.facilitators.index')
    ->with('facilitators', $facilitators);
}


public function create()
{
    return view('admin.facilitators.create');
}


public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required'
    ]);
    
    $password = str_random(8);

    $facilitator = new Facilitator;
    $facilitator->name = $request->name;
    $facilitator->url = str_slug($request->name);
    $facilitator->email = $request->email;
    $facilitator->phone = $request->phone;
    $facilitator->brief_bio = $request->brief_bio;
    $facilitator->password = bcrypt($password);

    if($request->hasFile('profile_pic')) {
        $file = $request->profile_pic;
        $newImageName = 'uploads/'.time().$file->getClientOriginalName();
        $img = Image::make($file)->orientate()
        ->fit(500, 500, function ($constraint) {
            $constraint->upsize();
        })
        ->save($newImageName, 60);

        $facilitator->profile_pic = $newImageName;
    }

    $facilitator->save();

    Session::flash('success', 'You have successfully added a facilitator');
    return redirect()->route('admin.facilitators.index');

}


public function upload_facilitators() {
    return view('admin.facilitators.upload');
}


public function do_upload_facilitators(Request $request) {
    $this->validate($request, [
        'uploaded_file' => 'required'
    ]);

    $path = $request->file('uploaded_file')->getRealPath();

    $data = Excel::load($path)->get();
    if($data->count() > 0) {
        foreach($data->toArray() as $key => $value) {
            $password = str_random(8);
            $encrypt_password = bcrypt($password);
            $insert_data[] = [
                'name' => $value['name'],
                'url' => str_slug($value['name']),
                'email' => $value['email'],
                'phone' => $value['phone'],
                'password' => $password,
                'brief_bio' => $value['brief_bio']
            ];
        }
        if(!empty($insert_data)) {
            //DB::table('facilitators')->insert($insert_data);
            for($i = 0; $i < count($insert_data); $i++) {
                $facilitator = new Facilitator;
                $facilitator->name = $insert_data[$i]['name'];
                $facilitator->url = $insert_data[$i]['url'];
                $facilitator->email = $insert_data[$i]['email'];
                $facilitator->phone = $insert_data[$i]['phone'];
                $facilitator->password = bcrypt($insert_data[$i]['password']);
                $facilitator->brief_bio = $insert_data[$i]['brief_bio'];
                $facilitator->save();
                /*
                    $data['sender_email'] = 'training@averti.com.ng';
                    $data['sender_name'] = 'Averti';
                    $data['email'] = $insert_data[$i]['email'];

                    Mail::send('email.facilitator_account_created',
                    array(
                        'subject' => 'Your InformedLMS Account is Live',
                        'recipient_name' => $insert_data[$i]['name'],
                        'recipient_email' => $insert_data[$i]['email'],
                        'recipient_password' => $insert_data[$i]['password']
                    ), 
                    function($message) use ($data) {
                        $message->from($data['sender_email'], $data['sender_name']);
                        $message->to($data['email'])
                        ->subject('Your InformedLMS Account is Live');
                    });
                */
            }
           
        }
    }
    Session::flash('success', 'You have successfully uploaded multiple facilitators to the platform');
    return redirect()->route('admin.facilitators.index');
}

public function activate($id) {
    $facilitator = Facilitator::where('id', $id)->first();

    return view('admin.facilitators.activate')
    ->with('facilitator', $facilitator);
}


public function do_activate(Request $request) {
    $password = str_random(8);
    $facilitator = Facilitator::where('id', $request->facilitator_id)->first();

    $facilitator->password = bcrypt($password);
    $facilitator->activated = 'yes';
    $facilitator->save();

    $data['sender_email'] = 'training@averti.com.ng';
    $data['sender_name'] = 'Averti';
    $data['email'] = $facilitator->email;

    Mail::send('email.facilitator_account_created',
    array(
        'subject' => 'Your InformedLMS Account is Live',
        'recipient_name' => $facilitator->name,
        'recipient_email' => $facilitator->email,
        'recipient_password' => $password
    ), 
    function($message) use ($data) {
        $message->from($data['sender_email'], $data['sender_name']);
        $message->to($data['email'])
        ->subject('Your InformedLMS Account is Live');
    });
    Session::flash('success', 'You have successfully activated the facilitators Profile');
    return redirect()->route('admin.facilitators.index');
}

public function edit($id)
{
    $facilitator = Facilitator::where('id', $id)->first();
    return view('admin.facilitators.edit')
    ->with('facilitator', $facilitator);
}


public function update(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required'
    ]);

    $facilitator = Facilitator::where('id', $request->facilitator_id)->first();
    $facilitator->name = $request->name;
    $facilitator->url = str_slug($request->name);
    $facilitator->email = $request->email;
    $facilitator->phone = $request->phone;
    $facilitator->brief_bio = $request->brief_bio;
    if($request->hasFile('profile_pic')) {
        $file = $request->profile_pic;
        $newImageName = 'uploads/'.time().$file->getClientOriginalName();
        $img = Image::make($file)->orientate()->save($newImageName, 60);
        $facilitator->profile_pic = $newImageName;
    }

    $facilitator->save();
    Session::flash('success', 'You have successfully updated a facilitator');
    return redirect()->route('admin.facilitators.index');
}


public function detail($id)
{
    $facilitator = Facilitator::where('id', $id)->first();
    $courses = Course::where('facilitator_id', $id)->get();
    
    return view('admin.facilitators.detail')
    ->with('facilitator', $facilitator)
    ->with('courses', $courses);
}


public function change_password($id) {
    $facilitator = Facilitator::where('id', $id)->first();
    return view('admin.facilitators.change_password')
    ->with('facilitator', $facilitator);
}


public function update_password(Request $request) {
    $this->validate($request, [
        'password' => 'required'
    ]);

    $facilitator = Facilitator::where('id', $request->facilitator_id)->first();
    $password = $request->password;
    $facilitator->password = bcrypt($request->password);
    $facilitator->save();

    $data['sender_email'] = 'training@excelpros-test.i.ng';
    $data['sender_name'] = 'ExcelProsLMS';
    $data['email'] = $facilitator->email;

    Mail::send('email.facilitator_password_reset',
    array(
        'subject' => 'Your Password Was Reset',
        'recipient_name' => $facilitator->name,
        'recipient_email' => $facilitator->email,
        'recipient_password' => $password,
        'site_link' => 'http://www.excelpros-test.i.ng/facilitator'
    ), 
    function($message) use ($data) {
        $message->from($data['sender_email'], $data['sender_name']);
        $message->to($data['email'])
        ->subject('Your Password Was Reset');
    });

    Session::flash('success', 'You have successfully updated the password');
    return redirect()->route('admin.facilitators.index');
}


public function change_picture($id) {
    $facilitator = Facilitator::where('id', $id)->first();
    return view('admin.facilitators.change_picture')
    ->with('facilitator', $facilitator);
}


public function update_picture(Request $request) {
    $this->validate($request, [
        'profile_pic' => 'required'
    ]);

    $facillitator = Facilitator::where('id', $request->facilitator_id)->first();

    $file = $request->profile_pic;
    $newImageName = 'uploads/'.time().$file->getClientOriginalName();

    $img = Image::make($file)->orientate()
    ->fit(500, 500, function ($constraint) {
        $constraint->upsize();
    })
    ->save($newImageName, 60);

    $facillitator->profile_pic = $newImageName;

    $facillitator->save();

    Session::flash('success', 'You have successfully updated the facillitator profile picture');
    return redirect()->route('admin.facilitators.index');
}


public function delete($id)
{
    $facilitator = Facilitator::where('id', $id)->first();
    return view('admin.facilitators.delete')
    ->with('facilitator', $facilitator);
}

public function destroy(Request $request)
{
    $facilitator = Facilitator::where('id', $request->facilitator_id)->first();
    $facilitator->delete();

    Session::flash('success', 'You have successfully deleted a facilitator');
    return redirect()->route('admin.facilitators.index');

}

public function evaluation($id, $course_id) {

}

    
}
