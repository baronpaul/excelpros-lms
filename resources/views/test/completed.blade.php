<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.mainlayout')

@section('content')


<main>

<style type="text/css">
#regiration_form fieldset:not(:first-of-type) {
    display: none;
}

.form_wrap {
    width: 100%;
    height: auto;
    padding: 20px;
    border: solid 1px #ddd;
    border-radius: 6px;
}
.mt100 {
    margin-top: 100px;
}
</style>

@include('includes.nav')

<div id="page_wrapper" class="pt-50">

    <div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <div class="page_title">
                    <h1>Test Completed</h1>
                </div>

                <div class="page_content">
                    <?php
                        $participation_id = request()->segment(3);

                        $participation = DB::table('participations')->where('participations.id', '=', $participation_id)->first();

                        $exam = DB::table('exams')->where('exam_id', '=', $participation->exam_id)->first();
                        
                        $answers = DB::table('answers')->join('questions', 'questions.question_id', '=', 'answers.question_id')
                        ->where('answers.participation_id', '=', $participation_id)->get();
                        
                    ?>

                    <!--<h3>Congratulations!</h3>-->
                    
                    <p>
                        {{ Session::get('message') }} 
                    </p>

                    

                </div>
            </div>

        </div>

        
    </div>

</div>

</main>

@include('includes.footer')

@include('includes.jsincludes')


@stop