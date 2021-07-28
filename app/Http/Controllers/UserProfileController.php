<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

use Session;

use App\User;



class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->middleware('auth');
    } 

    public function index()
    {
        $user_id = Auth::id();

        $user = Auth::user();

        return view('profile.index')
        ->with('user', $user);

    }

    
    public function edit()
    {
        $user = Auth::guard()->user();
        
        return view('profile.edit')
        ->with('user', $user);
    }

    public function update(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::where('id', $user_id)->first();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        
        $user->save();

        Session::flash('success', 'Your profile was updated successfully');
        return redirect()->route('profile.index');
    }

    

    public function change_password() {
        $user_id = Auth::id();

        return view('profile.change_password')
        ->with('user_id', $user_id);

    }


    public function do_change_password(Request $request) {
        $user_id = $request->user_id;
        $user = Auth::user();
        $user->password = bcrypt($request->newpassword);
        $user->save();
        Session::flash('success', 'You have updated your password');
        return redirect()->route('profile.index');
        
    }

    public function profile_pic()
    {
        $user = Auth::guard()->user();
        return view('profile.profile_pic')
        ->with('user', $user);
    }

    public function update_profile_pic(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::where('id', $user_id)->first();

        $profile_pic = $request->profile_pic;
        $profile_pic_new_name = time() . $profile_pic->getClientOriginalName();
        $profile_pic->move('uploads/profile/', $profile_pic_new_name);

        $user->profile_pic = 'uploads/profile/' . $profile_pic_new_name;
        $user->save();
        
        Session::flash('success', 'Your profile picture was updated successfully');
        return redirect()->route('profile.index');
    }
    

}
