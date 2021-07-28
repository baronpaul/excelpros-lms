<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

use Session;

use Purifier;

use App\User;

use App\Participant;

use App\TrainingProgram;

use App\Exam;

use App\ExamParticipation;

use App\Collection;

use App\Question;

use App\Participation;

use App\Answer;

use App\Organization;

class ExamController extends Controller
{
    
public function index() {
    $user_id = Auth::id();

    $participant = User::where('id', $user_id)->first();

    $training_program = TrainingProgram::where('program_id', $participant->program_id)->first();

    $organization = Organization::where('org_id', $training_program->org_id)->first();

    $exams = Exam::join('exam_participants', 'exam_participants.exam_id', 'exams.exam_id')
    ->where('exam_participants.user_id', '=', $user_id)
    ->where('exams.exam_status', 'active')->get();

    return view('test.index')
    ->with('organization', $organization)
    ->with('training_program', $training_program)
    ->with('exams', $exams);
}


public function test_intro($url) {
    $user_id = Auth::id();

    $participant = User::where('id', $user_id)->first();

    $training_program = TrainingProgram::where('program_id', $participant->program_id)->first();

    $organization = Organization::where('org_id', $training_program->org_id)->first();

    $exam = Exam::where('exam_url', $url)->first();
    
    return view('test.intro')
    ->with('organization', $organization)
    ->with('training_program', $training_program)
    ->with('exam', $exam);
}


public function take_test($url) { 
    $exam = Exam::where('exam_url', $url)->first();
    $exam_id = $exam->exam_id;
    $exam_status = $exam->exam_status;
    $exam_type = $exam->exam_type;
    $user_id = Auth::id();
    $num = $exam->number_of_questions;
    $col_id = $exam->collection_id;
    $time_limit = $exam->time_limit;
    if($exam_type == 'multiple choice') {
        $questions = Question::where('collection_id', $col_id)->orderBy(DB::raw('RAND()'))->take($num)->get()->toArray();
    }
    else {
        $questions = Question::where('collection_id', $col_id)->take($num)->get()->toArray();
    }
    

    if($this->has_completed_test($exam_id, $user_id)) {
        return $this->failed_redirect('You have already taken and completed this test. You are not allowed to retake it');
    }
    elseif($this->exceeed_attempts($exam_id, $user_id, 3)){
        return $this->failed_redirect('You have already attempted this test more than the number of times allowed');
    }
    elseif($this->has_attempted($exam_id, $user_id)) {
        $participation = Participation::where('exam_id', $exam_id)->where('user_id', $user_id)->first();
        $participation->started_at = date('Y-m-d H:i:s');
        $participation->attempts = $participation->attempts + 1;
        $participation->save();
        $participation_id = $participation->id;
        return $this->display_exam($participation_id, $exam, $questions); 
    }
    elseif($this->not_taken_test($exam_id, $user_id)) {
        //update test participation
        $participation = new Participation;
        $participation->exam_id = $exam_id;
        $participation->user_id = $user_id;
        $participation->started = 'yes';
        $participation->started_at = date('Y-m-d H:i:s');
        $participation->attempts = 1;
        $participation->save();
        $participation_id = DB::getPdo()->lastInsertId();
        return $this->display_exam($participation_id, $exam, $questions);
    } 
}


public function submit_test(Request $request) 
{
    $correct_answers = 0;

    $participation_id = Session::get('participation_id');
    $exam_id = Session::get('exam_id');
    $exam = Exam::where('exam_id', $exam_id)->first();
    $exam_no_of_questions = $exam->number_of_questions;
    $exam_type = $exam->exam_type;

    $data = $request->except(['_token', 'questions', 'comments']);
    $questions = $request->questions;

    $user_id = Auth::id();
    $participation = Participation::where('id', $participation_id)->first();

    //if the test is active continue and submit the result
    for($i = 0; $i < count($questions); $i++) {
        $answer = new Answer;
        $question_id = $questions[$i];

        if(isset($data[$question_id])){
            $submitted_ans = $data[$question_id];
        }
        else {
            $submitted_ans = null;
        }
        
        $answer->participation_id = $participation_id;
        $answer->question_id = $question_id;
        $answer->response = $submitted_ans;
        $answer->attempt = $participation->attempts;
        $answer->save();

        $question = Question::where('question_id', $question_id)->first();
        $right_ans = $question->correct;
        if($submitted_ans == $right_ans) {
            $correct_answers++;
        }
    }

    $score = ($correct_answers / $exam_no_of_questions) * 100;
    
    $participation->completed = 'yes';
    $participation->completed_at = date('Y-m-d H:i:s');
    $participation->correct_answers = $correct_answers;
    $participation->score = $score;
    $participation->comments = $request->comments;
    $participation->isterminated = $request->terminated;
    if($exam->exam_type == 'multiple choice') {
        $participation->graded = 'yes';
    }
    $participation->save();

    if($request->terminated == 'yes') {
        Session::flash('message', 'You violated the instructions set for this assessment by switching your tabs in the middle of the test. Your test has been terminated.');
    }
    else {
        if($exam->show_score == 'yes') {
            Session::flash('message', 'You have completed the test. Your score is '.$score.'%.');
        }
        else {
            Session::flash('message', 'Congratulations! You have completed the test.');
        }
    }

    return redirect()->route('test.completed', ['id' => $participation->id]);

}


function submit_essay_test(Request $request) 
{
    $participation_id = Session::get('participation_id');
    $exam_id = Session::get('exam_id');
    $exam = Exam::where('exam_id', $exam_id)->first();
    $exam_no_of_questions = $exam->number_of_questions;

    $data = $request->except('_token', 'comments');
    $user_id = Auth::id();
    $participation = Participation::where('id', $participation_id)->first();
    $questions = $request->questions;

    for($i = 0; $i < count($questions); $i++) {
        $answer = new Answer;
        $question_id = $questions[$i];

        if(isset($data[$question_id])){
            $submitted_ans = Purifier::clean($data[$question_id]);
        }
        else {
            $submitted_ans = null;
        }
        
        $answer->participation_id = $participation_id;
        $answer->question_id = $question_id;
        $answer->response = $submitted_ans;
        $answer->attempt = $participation->attempts;
        $answer->save();
    }
    $participation->completed = 'yes';
    $participation->completed_at = date('Y-m-d H:i:s');
    $participation->comments = $request->comments;
    $participation->isterminated = $request->terminated;
    $participation->save();

    if($request->terminated == 'yes') {
        Session::flash('message', 'You violated the instructions set for this assessment by switching your tabs in the middle of the test. Your test has been terminated.');
    }
    else {
        Session::flash('message', 'Congratulations! You have completed the test.');
    }

    return redirect()->route('test.completed', ['id' => $participation->exam_id]);
}


public function test_completed($id) {
    $exam = Exam::where('exam_id', $id)->first();

    return view('test.completed')
    ->with('exam', $exam);
}


public function questions() {
    $questions = Question::orderBy(DB::raw('RAND()'))->take(4)->get()
    ->toArray();

    return view('questions')
    ->with('questions', $questions);
}


private function test_not_active($exam_id, $exam_staus) {
}


private function not_taken_test($exam_id, $user_id) {
    $res = Participation::where('exam_id', $exam_id)
    ->where('user_id', $user_id)
    ->where('completed', 'yes')
    ->first();
    if($res == null) {
        return true;
    }
    else {
        return false;
    }
}


private function has_taken_test($exam_id, $user_id) {
    $res = Participation::where('exam_id', $exam_id)
    ->where('user_id', $user_id)
    ->first();
    if($res != null) {
        return true;
    }
    else {
        return false;
    }
}


private function update_attempts($exam_id, $user_id) {
    $participation = Participation::where('exam_id', $exam_id)
    ->where('user_id', $user_id)->first();
    $attempt = $participation->attempts;
    $participation->attempts = $attempt + 1;
    $participation->save();
}


private function test_attempts($exam_id, $user_id) {
    $participation = Participation::where('exam_id', $exam_id)
    ->where('user_id', $user_id)
    ->first();
    return $participation->attempts;
}


private function has_attempted($exam_id, $user_id) {
    $taken_test = $this->has_taken_test($exam_id, $user_id);
    if($taken_test) {
        $participation = Participation::where('exam_id', $exam_id)
        ->where('user_id', $user_id)->first();
        if($participation->attempts != 0) {
            return true;
        }
        else {
            return false;
        }
    }
    else{
        return false;
    }
}


private function exceeed_attempts($exam_id, $user_id, $num) {
    $taken_test = $this->has_taken_test($exam_id, $user_id);
    if($taken_test) {
        $participation = Participation::where('exam_id', $exam_id)
        ->where('user_id', $user_id)->first();
        if($participation->attempts >= $num) {
            return true;
        }
        else {
            return false;
        }
    }
    else {
        return false;
    }
}


private function has_completed_test($exam_id, $user_id) {
    $res = Participation::where('exam_id', $exam_id)
    ->where('user_id', $user_id)
    ->where('completed', 'yes')
    ->first();
    if($res != null) {
        return true;
    }
    else {
        return false;
    }
}


private function failed_redirect($message) {
    Session::flash('failure', $message);
    return redirect()->back();
}


private function display_exam($participation_id, $exam, $questions) {
    Session::put('participation_id', $participation_id);
    Session::put('exam_id', $exam->exam_id);
    
    if($exam->exam_type == 'essay') {
        return view('test.begin_essay')
        ->with('questions', $questions)
        ->with('exam', $exam)
        ->with('time_limit', $exam->time_limit);
    }
    else {
        return view('test.begin_objective')
        ->with('questions', $questions)
        ->with('exam', $exam)
        ->with('time_limit', $exam->time_limit);
    }
}


}
