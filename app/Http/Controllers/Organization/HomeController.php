<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/organization/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('organization.auth:organization');
    }


    /**
     * Show the Organization dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('organization.home');
    }

}