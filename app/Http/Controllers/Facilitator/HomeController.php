<?php

namespace App\Http\Controllers\Facilitator;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/facilitator/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('facilitator.auth:facilitator');
    }


    /**
     * Show the Facilitator dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('facilitator.home');
    }

}