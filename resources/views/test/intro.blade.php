@extends('layouts.mainlayout')

@section('content')

<main>

@include('includes.nav')

<div id="page_wrapper" class="pt-50 pb-50">

    <div class="container">
        
        @if(session()->has('failure'))
        <div class="alert alert-danger ">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <span class="text-center"><strong>Sorry! </strong>
            {{ session()->get('failure') }}</span>
        </div>
        @endif

        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <div class="page_title text-center">
                    <h1>{{ $exam->exam_title }}</h1>
                    <p>Type: {{ $exam->exam_type }}</p>
                    <p>Durations: {{ $exam->time_limit }} minutes</p><br>
                </div>

                <div class="page_content instruction well">
                    <h3 class="text-center">Instructions</h3>
                    <p>
                        Please read the instructions below very carefully and endeavour to follow them. 
                    </p>
                    <ul>
                        <li>
                            Once you begin the test, DO NOT attempt to open another browser window or switch browser tabs to another browser window.
                        </li>
                        <li>
                            You are expected to take the test on your own without receiving any form of coaching or assistance from anyone or by consulting any material whether physical or electronic.
                        </li>
                        <li>
                            When your test window loads, please avoid refreshing the browser window.
                        </li>
                        <li>
                            Please disable all popup notifications on your tablet as this can affect the outcome of the test.
                        </li>
                        @if($exam->exam_type == 'multiple choice')
                        <li>
                            You will be expected to answer a series of questions, each question will be displayed on a separate window. Select the answer and click next to display the next question. When you get to the last question. click 'submit' to submit and end the test.
                        </li>
                        @else
                        <li>
                            You will be expected to answer a series of questions, each question will be displayed on a separate window. Write the answer in the textarea provided. When you answer the final question, click 'submit' to submit and end the test.
                        </li>
                        @endif
                        <li>
                            The time allowed (duration) for the test is as shown above. You are expected to complete the test in that time. When the timer hits zero, the test will be concluded automatically.
                        </li>
                        @if($exam->instructions != null)
                            {!! $exam->instructions !!}
                        @endif
                        
                    </ul>
                    <br>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="test_wrap text-center text-center">
                    
                    <a href="{{ route('test.begin', ['url' => $exam->exam_url]) }}" class="btn btn-info">Begin Test</a>
                    
                </div>
            </div>
        </div>
    </div>

</div>

</main>

@include('includes.footer')

@include('includes.jsincludes')

@stop