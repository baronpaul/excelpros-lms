@extends('facilitator.layouts.facilitatorlayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Assessment Details</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('facilitator.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('facilitator.assessment.index') }}">Assessments</a>
          </li>
          
          <li class="active">
            Assessment Details
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
    
        <div class="white-box">
            <div class="row">
              
              <div class="col-md-10 col-sm-12 col-xs-12">
                <h3>{{ $participation->firstname }} {{ $participation->lastname }}</h3> 
                <p>Email: {{ $participation->email }}</p>
              </div>

              
              <div class="col-md-2">
                <span class="btn btn-info">Has been graded</span>
              </div>
              
            </div>
        </div>
        
        <div class="white-box">
          <div class="row">
              <div class="col-md-12">
                  <h4>{{ $exam->exam_title }}</h4>
                  <p>{{ $exam->exam_description }}</p>
                  <hr>
              </div>

              <div class="col-md-3 col-sm-6 col-xs-12">
                  <p>Exam Type:<br>{{ $exam->exam_type }}</p>
              </div>

              
              <div class="col-md-3 col-sm-6 col-xs-12">
                <p>Time Limit:<br>{{ $exam->time_limit }}</p>
              </div>

              <div class="col-md-3 col-sm-6 col-xs-12">
                <p>No of Questions:<br>{{ $exam->number_of_questions }}</p>
              </div>

              <div class="col-md-3 col-sm-6 col-xs-12">
                <p>Score:<br>{{ $participation->score }}%</p>
              </div>

          </div>
        </div>

        <div class="white-box">
            <div class="row">
                
                <div class="col-md-12 tasks_wrap">
                    @foreach($answers as $answer)
                    <div class="question_cont">
                        <div class="question">
                            <p><strong>Question: </strong></p>
                            {!! $answer->question_name !!}
                        </div>
                        
                        <div class="answer_options">
                            <p><strong>Options: </strong></p>
                            <ul>       
                                @if($answer->answer1 != null) 
                                <li><strong>1: </strong> {{ $answer->answer1 }}</li>
                                @endif
    
                                @if($answer->answer2 != null) 
                                <li><strong>2: </strong> {{ $answer->answer2 }}</li>
                                @endif
    
                                @if($answer->answer3 != null) 
                                <li><strong>3: </strong> {{ $answer->answer3 }}</li>
                                @endif
    
                                @if($answer->answer4 != null) 
                                <li><strong>4: </strong> {{ $answer->answer4 }}</li>
                                @endif
    
                                @if($answer->answer5 != null) 
                                <li><strong>4: </strong> {{ $answer->answer5 }}</li>
                                @endif
                                
                            </ul>
                        </div>
                        <p>Correct Answer: {{ $answer->correct }}</p>
                        <p>Response: {{ $answer->response }}</p>
                        
                    </div>
                    @endforeach

                    <div class="btn-wrap">
                        
                        <a href="{{ route('facilitator.assessment.export_participation', ['id' => $participation->id]) }}" 
                            class="btn btn-info btn-lg">
                            Export to PDF</a>

                        <a href="{{ URL::previous() }}" class="btn btn-info btn-lg pull-right">Back to Assessment</a>
                    </div>
                    
                </div>
    
            </div>
        </div>

    </div>  

  </div>

</div>

@endsection
