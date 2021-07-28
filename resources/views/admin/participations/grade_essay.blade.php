<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Exam Detail</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.exams.index') }}">Exams</a>
          </li>
          
          <li class="active">
            Exam Detail
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
          <div class="row">
              <div class="col-md-12">
                  <h3>{{ $exam->exam_title }}</h3>
                  <p>{{ $exam->exam_description }}</p>
                  <hr>
              </div>

              <div class="col-md-3">
                  <p>Exam Type:<br>{{ $exam->exam_type }}</p>
              </div>

              
              <div class="col-md-3">
                <p>Time Limit:<br>{{ $exam->time_limit }}</p>
              </div>

              <div class="col-md-3">
                <p>No of Questions:<br>{{ $exam->number_of_questions }}</p>
              </div>

          </div>
      </div>

      <div class="white-box">
        <div class="row">
            
            <div class="col-md-12 tasks_wrap">
                <form action="{{ route('admin.participations.submit_grade') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="participation_id" value="{{ $participation->id }}">
                    @foreach($answers as $answer)
                    
                    <div class="question_cont">
                        <div class="question">
                            <div class="question_txt">{!! $answer->question_name !!}</div>
                            <p class="marks">Marks: {{ $answer->max_point }}</p>
                        </div>
                        <div class="answer_options">
                            <p>Answer: </p>
                            <div>{!! $answer->response !!}</div>
                        </div>
                        <div class="answer_score row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Score</label>
                                    <input type="text" name="{{ $answer->answer_id }}" class="form-control" 
                                    value="{{ $answer->answer_score }}" placeholder="score for this question">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach

                    <div class="btn-wrap">
                        
                        <button class="btn btn-info" type="submit">Submit Grade</button>
                        
                        <a href="{{ URL::previous() }}" class="btn btn-info btn-lg pull-right">Go Back</a>
                      
                    </div>
                </form>

            </div>


        </div>
      </div>

    </div>  

  </div>

</div>

@endsection