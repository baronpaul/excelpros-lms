<?php

namespace App\Http\Controllers\Facilitator;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use Session;

use Image;

use App\Organization;

use App\TrainingProgram;

use App\Course;

use App\CourseMaterial;

use App\Exam;

use App\Facilitator;

use App\FacilitatorEvaluation;

class FacilitatorProfileController extends Controller
{
    protected $redirectTo = '/facilitator/login';
    
    
    public function __construct()
    {
        $this->middleware('facilitator.auth:facilitator');
    }


    public function index()
    {
        $facilitator_id = Auth::guard('facilitator')->id();

        $facilitator = Facilitator::where('id', $facilitator_id)->first();

        return view('facilitator.profile.index')
        ->with('facilitator', $facilitator);
    }

    
    public function edit()
    {
        $facilitator_id = Auth::guard('facilitator')->id();

        $facilitator = Facilitator::where('id', $facilitator_id)->first();

        return view('facilitator.profile.edit')
        ->with('facilitator', $facilitator);
    }

    
    public function update(Request $request)
    {
        $facilitator_id = Auth::guard('facilitator')->id();
        $facilitator = Facilitator::where('id', $facilitator_id)->first();

        $facilitator->name = $request->name;
        $facilitator->url = str_slug($request->name);
        $facilitator->email = $request->email;
        $facilitator->phone = $request->phone;
        $facilitator->brief_bio = $request->brief_bio;
        $facilitator->save();

        Session::flash('success', 'You have successfully updated your profile');
        return redirect()->route('facilitator.profile.index');
    }

    
    public function change_password()
    {
        $facilitator_id = Auth::guard('facilitator')->id();
        $facilitator = Facilitator::where('id', $facilitator_id)->first();

        return view('facilitator.profile.change_password')
        ->with('facilitator', $facilitator);
    }

    
    public function update_password(Request $request)
    {
        $facilitator_id = Auth::guard('facilitator')->id();
        $facilitator = Facilitator::where('id', $facilitator_id)->first();

        $facilitator->password = bcrypt($request->password);
        $facilitator->save();

        Session::flash('success', 'You have successfully updated your password');
        return redirect()->route('facilitator.profile.index');
    }


    public function change_profile_pic()
    {
        $facilitator_id = Auth::guard('facilitator')->id();
        $facilitator = Facilitator::where('id', $facilitator_id)->first();

        return view('facilitator.profile.change_profile_pic')
        ->with('facilitator', $facilitator);
    }

    
    public function update_profile_pic(Request $request)
    {
        $facilitator_id = Auth::guard('facilitator')->id();
        $facilitator = Facilitator::where('id', $facilitator_id)->first();

        $file = $request->profile_pic;
        $newImageName = 'uploads/'.time().$file->getClientOriginalName();
        $img = Image::make($file)->orientate()->save($newImageName, 60);

        $facilitator->profile_pic = $newImageName;
        $facilitator->save();

        Session::flash('success', 'You have successfully updated your profile picture');
        return redirect()->route('facilitator.profile.index');
    }

    
}
