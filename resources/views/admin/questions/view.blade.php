@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">View Question</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.questions.index') }}">Questions</a>
          </li>
          
          <li class="active">
            View Question
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

                <div class="question_cont">
                    <div class="question">
                        <p><strong>Question: </strong></p>
                        <div class="question_txt">{!! $question->question_name !!}</div>
                        
                        @if($question->question_image != NULL)
                        <div class="ques_img">
                            <img src="{{ asset($question->question_image) }}" />
                        </div>
                        @endif
                        <p class="marks">Marks: {{ $question->max_point }}</p>
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
                    @if($question->correct != null)
                    <p>Correct Answer: {{ $question->correct }}</p>
                    @endif
                    
                </div>
                
                <div class="btn_wrap">
                  <a href="{{ URL::previous() }}" class="btn btn-info btn-lg">Go Back</a>
                </div>
            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

@endsection