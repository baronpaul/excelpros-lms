<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Delete Participation</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.exams.index') }}">Exams</a>
          </li>
          
          <li class="active">
            Participation Detail
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
                <p>Address: {{ $participation->address }}</p>
                <p>City: {{ $participation->city }}</p>
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

          </div>
        </div>

        <div class="white-box">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.participations.destroy_participation', ['id' => $exam->exam_id]) }}" method="POST">
                      {{ csrf_field() }}

                      <input type="hidden" name="participation_id" value="{{ $participation->id }}">

                      <button type="submit" class="btn btn-info btn-lg">Delete Participation</button>
                    </form>
                </div>
            </div>
        </div>

    </div>  

  </div>

</div>

@endsection