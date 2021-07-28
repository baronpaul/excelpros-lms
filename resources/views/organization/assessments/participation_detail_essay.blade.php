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
                      
                      <div class="col-md-10 col-sm-12 col-xs-12">
                        <h3>{{ $participation->firstname }} {{ $participation->lastname }}</h3> 
                        <p>Email: {{ $participation->email }}</p>
                      </div>
        
                      
                      <div class="floating_btn">
                        @if($participation->graded == 'no')
                          <span class="btn btn-primary">Essay Exam. Not graded</span>
                        @else
                          <span class="btn btn-info">Has been graded</span>
                        @endif
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
                        <div class="col-md-12">
                          <div class="btn-wrap">
                              @if($participation->graded == 'no')
                              <span class="btn btn-info btn-lg">Has not been graded</span>
                              @else
                              <span class="btn btn-info btn-lg">Has been graded</span>
                              @endif
        
                              <a href="{{ route('organization.assessment.export_participation', ['id' => $participation->id]) }}" 
                                class="btn btn-info btn-lg">
                                Export to PDF</a>
                              <a href="{{ URL::previous() }}" class="btn btn-info btn-lg pull-right">Back to Assessment</a>
                            </div>
                        </div>
        
                        <div class="col-md-12 tasks_wrap">
        
                            @foreach($answers as $answer)
                            
                            <div class="question_cont">
                                <div class="question">
                                    <p><strong>Question: </strong></p>
                                    <div class="question_txt">{!! $answer->question_name !!}</div>
                                    <p class="marks">Marks for Question: {{ $answer->max_point }}</p>
                                </div>
                                <div class="answer_options">
                                    <p><strong>Answer: </strong></p>
                                    <div class="answer_txt">
                                      {!! $answer->response !!}
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
        
                            <div class="btn-wrap">
                              
                              <a href="{{ route('organization.assessment.export_participation', ['id' => $participation->id]) }}" 
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

  </div>
</div>

@endsection
