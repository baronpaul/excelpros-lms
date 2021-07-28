<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;

use Session;

use Carbon\Carbon;

use App\Course;

use App\User;

use App\Facilitator;

use App\FacilitatorEvaluation;

use App\ProgramEvaluation;

use App\Organization;

use App\Participant;

use App\TrainingProgram;


class EvaluationsController extends Controller
{
    
public function index()
{
    $user_id = Auth::id();

    $participant = User::where('id', $user_id)->first();

    $training_program = TrainingProgram::where('program_id', $participant->program_id)->first();

    $organization = Organization::where('org_id', $training_program->org_id)->first();

    return view('evaluations.index')
    ->with('training_program', $training_program)
    ->with('organization', $organization);
}


public function facilitators() {
    $user_id = Auth::id();

    $participant = User::where('id', $user_id)->first();

    $training_program = TrainingProgram::where('program_id', $participant->program_id)->first();

    $organization = Organization::where('org_id', $training_program->org_id)->first();

    $facilitators = Facilitator::join('courses', 'courses.facilitator_id', '=', 'facilitators.id')
    ->join('training_programs', 'training_programs.program_id', '=', 'courses.program_id')
    ->where('training_programs.program_id', '=', $participant->program_id)
    ->get(); 

    return view('evaluations.facilitators')
    ->with('training_program', $training_program)
    ->with('organization', $organization)
    ->with('facilitators', $facilitators)
    ->with('user_id', $user_id);
}


public function facilitator_evaluation($url)
{
    $facilitator = Facilitator::where('url', $url)->first();
    
    $course = Course::where('facilitator_id', $facilitator->id)->first();

    $user_id = Auth::id();

    $participant = User::where('id', $user_id)->first();

    $training_program = TrainingProgram::where('program_id', $participant->program_id)->first();

    $organization = Organization::where('org_id', $training_program->org_id)->first();

    return view('evaluations.facilitator_evaluation')
    ->with('facilitator', $facilitator)
    ->with('organization', $organization)
    ->with('training_program', $training_program)
    ->with('course', $course)
    ->with('user_id', $user_id);
}


public function store_facilitator_evaluation(Request $request)
{
    $training_progam = TrainingProgram::where('program_id', $request->program_id)->first();
    
    $facilitator_evaluation = new FacilitatorEvaluation;

    $facilitator_evaluation->program_id = $request->program_id;
    $facilitator_evaluation->facilitator_id = $request->facilitator_id;
    $facilitator_evaluation->course_id = $request->course_id;
    $facilitator_evaluation->user_id = $request->user_id;
    $facilitator_evaluation->topic_rating = $request->topic_rating;
    $facilitator_evaluation->content_knowledge_rating = $request->content_knowledge_rating;
    $facilitator_evaluation->content_delivery_style_rating = $request->content_delivery_style_rating;
    $facilitator_evaluation->time_management_rating = $request->time_management_rating;
    $facilitator_evaluation->skill_transfer_capability_rating = $request->skill_transfer_capability_rating;
    $facilitator_evaluation->addressing_questions_rating = $request->addressing_questions_rating;
    $facilitator_evaluation->overall_rating = $request->overall_rating;
    $facilitator_evaluation->overall_comment = $request->overall_comment;
    $facilitator_evaluation->save();

    Session::flash('message', 'Successfully submitted.');
    return redirect()->route('evaluations.facilitators');
}

public function facilitator_evaluation_thanks()
{
    return view('evaluations.facilitator_evaluation_thanks');
}


public function program_evaluation()
{
    
    $user_id = Auth::id();

    $participant = User::where('id', $user_id)->first();

    $training_program = TrainingProgram::where('program_id', $participant->program_id)->first();

    $organization = Organization::where('org_id', $training_program->org_id)->first();

    $evaluation = ProgramEvaluation::where('program_id', $training_program->program_id)->where('user_id', $user_id)->first();
    
    //dd($this->completed_facilitator_evaluation());
    
    if($this->completed_facilitator_evaluation()) {
        if($evaluation != null) {
            return view('evaluations.program_completed_eval')
            ->with('training_program', $training_program)
            ->with('organization', $organization)
            ->with('user_id', $user_id);
        }
        else {
            return view('evaluations.program')
            ->with('training_program', $training_program)
            ->with('organization', $organization)
            ->with('user_id', $user_id);
        }
    }
    else {
        return view('evaluations.program_no_eval')
        ->with('training_program', $training_program)
        ->with('organization', $organization)
        ->with('user_id', $user_id);
    }
    
}


public function store_program_evaluation(Request $request)
{
    $program_evaluation = new ProgramEvaluation;

    $program_evaluation->program_id = $request->program_id;
    
    $program_evaluation->user_id = $request->user_id;
    $program_evaluation->learned = $request->learned;
    $program_evaluation->will_apply = $request->will_apply;
    $program_evaluation->additional_training_required = $request->additional_training_required;
    $program_evaluation->content_quality_rating = $request->content_quality_rating;
    $program_evaluation->materials_quality_rating = $request->materials_quality_rating;
    $program_evaluation->methodology_rating = $request->methodology_rating;
    $program_evaluation->overall_rating = $request->overall_rating;
    $program_evaluation->overall_comment = $request->overall_comment;
    
    $user = Auth::user();
    $user->evaluation = 'yes';
    $user->user_status = 'completed';
    $user->save();
    $program_evaluation->save();

    Session::flash('message', 'Successfully submitted.');
    return redirect()->route('evaluations.program_evaluation_thanks');
}



public function program_evaluation_thanks()
{
    $user_id = Auth::id();

    $participant = User::where('id', $user_id)->first();

    $training_program = TrainingProgram::where('program_id', $participant->program_id)->first();

    $organization = Organization::where('org_id', $training_program->org_id)->first();

    return view('evaluations.program_evaluation_thanks')
    ->with('organization', $organization)
    ->with('training_program', $training_program);
}


private function completed_facilitator_evaluation() {
    $user_id = Auth::id();

    $participant = User::where('id', $user_id)->first();

    $training_program = TrainingProgram::where('program_id', $participant->program_id)->first();

    $facilitators = Facilitator::join('courses', 'courses.facilitator_id', '=', 'facilitators.id')
    ->join('training_programs', 'training_programs.program_id', '=', 'courses.program_id')
    ->where('training_programs.program_id', '=', $participant->program_id)
    ->get(); 
    $facilitator_count = $facilitators->count();
    $check = 0;

    foreach($facilitators as $facilitator) {
        $evaluation = FacilitatorEvaluation::where('user_id', $user_id)->where('facilitator_id', $facilitator->id)->first();
        //dd($evaluation);
        if($evaluation != null) {
            $check += 1;
        }
    }
    if($facilitator_count == $check) {
        return true;
    }
    else {
        return false;
    }
}

}
