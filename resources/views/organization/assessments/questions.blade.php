@extends('organization.layouts.mainsite')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Assessment</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('org.home') }}">Dashboard </a>
          </li>

          <li class="active">
            Assessment 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h4>Welcome, {{ auth()->guard('organization')->user()->contact_person }} ({{ auth()->guard('organization')->user()->org_name }})</h4>
                </div>

                <div class="white-box">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>{{ $exam->org_name }} - {{ $exam->program_name }}</h3>
                            <h4>Exam Title: {{ $exam->exam_title }}</h4>
                            <h4>Exam Type: {{ $exam->exam_type }}</h4>
                            <h4>Duration: {{ $exam->time_limit }} minutes</h4>
                        </div>
                    </div>
                </div>

                <div class="white-box">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Questions</h3>
        
                            @if (isset($questions) && $questions->count() > 0)
                                @foreach($questions as $question)
                                <div class="question_cont">
                                    <div class="question">
                                        <p><strong>Question: </strong></p>
                                        <div class="question_txt">{!! $question->question_name !!}</div>
                                        
                                        @if($question->question_image != NULL)
                                        <div class="ques_img">
                                            <img src="{{ asset($question->question_image) }}" />
                                        </div>
                                        @endif
                                        
                                    </div>
                
                                    <div class="answer_options">
                                        <p><strong>Options: </strong></p>
                                        <ul>       
                                            @if($question->answer1 != null) 
                                            <li><strong>1: </strong> {{ $question->answer1 }}</li>
                                            @endif
                
                                            @if($question->answer2 != null) 
                                            <li><strong>2: </strong> {{ $question->answer2 }}</li>
                                            @endif
                
                                            @if($question->answer3 != null) 
                                            <li><strong>3: </strong> {{ $question->answer3 }}</li>
                                            @endif
                
                                            @if($question->answer4 != null) 
                                            <li><strong>4: </strong> {{ $question->answer4 }}</li>
                                            @endif
                
                                            @if($question->answer5 != null) 
                                            <li><strong>4: </strong> {{ $question->answer5 }}</li>
                                            @endif
                                            
                                        </ul>
                                    </div>
                                    <hr>
                                    <p class="marks">Marks: {{ $question->max_point }}</p>
                                </div>
                                @endforeach
                                
                            @else
                                <p>There are no records of exam questions to display</p>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>  

  </div>
</div>

@endsection
