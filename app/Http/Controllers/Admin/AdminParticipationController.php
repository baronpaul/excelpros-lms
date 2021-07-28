<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

use Session;

use Excel;

use App\Exam;

use App\Participation;

use App\User;


class AdminParticipationController extends Controller
{
protected $redirectTo = '/admin/login';


public function __construct()
{
    $this->middleware('admin.auth:admin');
}


public function index()
{
    $participations = Participation::join('exams', 'exams.exam_id', '=', 'participations.exam_id')
    ->join('users', 'users.id', '=', 'participations.user_id')
    ->get();

    return view('admin.participations.index')
    ->with('participations', $participations);
}

public function filtered(Request $request)
{
    $participations = Participation::join('exams', 'exams.exam_id', '=', 'participations.exam_id');
    $participations->join('users', 'users.id', '=', 'participations.user_id');
    if($request->has('exam_id') && $request->exam_id != '') {
        $participations->where('participations.exam_id', '=', $request->exam_id);
    }
    if($request->has('min_score') && $request->min_score != '') {
        $participations->where('participations.score', '>=', $request->min_score);
    }
    $participations = $participations->get();

    $exam_id = $request->exam_id;
    Session::put('exam_id', $exam_id);
    $min_score = $request->min_score;
    Session::put('min_score', $min_score);

    return view('admin.participations.index')
    ->with('participations', $participations);
}


public function export_filtered()
{
    $participations = Participation::join('exams', 'exams.exam_id', '=', 'participations.exam_id');
    $participations->join('users', 'users.id', '=', 'participations.user_id');
    
    if(null !== Session::get('exam_id')) {
        $participations->where('participations.exam_id', '=', Session::get('exam_id'));
    }
    if(null !== Session::get('min_score')) {
        $participations->where('participations.score', '>=', Session::get('min_score'));
    }
    $participations->select('users.firstname', 'users.lastname', 'users.email', 'participations.started_at', 'participations.completed', 
    'participations.completed_at','participations.attempts', 'participations.exam_id');

    $participations = $participations->get();

    $participationsArray = [];

    $participationsArray[] = ['Firstname', 'Lastname', 'Email', 'Time Started', 'Completed', 'Time Completed', 'No of Attempts'];

    foreach($participations as $participation) {
        $participationsArray[] = $participation->toArray();
    }
    $filename = 'Quizmaster-exam-participation-'.time();

    Excel::create($filename, function($excel) use($participationsArray) {
        $excel->setTitle('Job Applications');
        $excel->setCreator('Quiz Master')->setCompany('Quiz Master');
        $excel->setDescription('Data of Exam Participation');
        $excel->sheet('Sheet 1', function($sheet) use($participationsArray) {
            $sheet->fromArray($participationsArray, null, 'A1', false, false);
        });
    })->download('xlsx');
}

    
}
