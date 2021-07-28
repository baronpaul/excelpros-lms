<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    use AuthenticatesUsers;

    
    protected $redirectTo = '/home';

    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->page_class = 'not-transparent-header';
    }

    public function showLoginForm()
    {
        return view('auth.login')
        ->with('page_class', $this->page_class);
    }


    public function LoginForm()
    {
        return view('auth.login')
        ->with('page_class', $this->page_class);
    }
    
}
