<?php

namespace App\Http\Controllers\Org;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/org/login';

    
    public function __construct()
    {
        $this->middleware('org.auth:org');
    }


    /**
     * Show the Org dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('org.home');
    }

}