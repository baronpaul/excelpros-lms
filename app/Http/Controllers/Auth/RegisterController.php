<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Participant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

   
    protected $redirectTo = '/home';

    
    public function __construct()
    {
        $this->middleware('guest');
        $this->page_class = 'not-transparent-header';
    }

    public function showRegistrationForm()
    {
        return view('auth.register')
        ->with('page_class', $this->page_class);
    }

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    
    protected function create(array $data)
    {
        
        $user = new User;
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->password = bcrypt($data['password']);
        
        $user->save();
        
        return $user;
        
    }
}
