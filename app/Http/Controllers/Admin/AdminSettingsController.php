<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use Session;

use App\StaffProfile;

class AdminSettingsController extends Controller
{
protected $redirectTo = '/admin/login';


public function __construct()
{
    $this->middleware('admin.auth:admin');
}


public function index()
{
    //
}


public function create()
{
    //
}


public function store(Request $request)
{
    //
}


public function show($id)
{
    //
}


public function edit($id)
{
    //
}


public function update(Request $request, $id)
{
    //
}


public function delete($id)
{
    //
}


public function destroy(Request $request, $id)
{
    //
}
}
