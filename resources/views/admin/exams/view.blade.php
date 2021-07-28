<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">{{ $exam->exam_title }}</h4>
        
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
            
              <div class="inner_nav">
                <a href="{{ route('admin.exams.add_participants', ['exam_id' => $exam->exam_id]) }}" class="btn btn-info">
                  Add Participants
                </a>

                <a href="{{ route('admin.exams.view_questions', ['exam_id' => $exam->exam_id]) }}" class="btn btn-info">
                  View Questions
                </a>

                <a href="{{ route('admin.exams.edit', ['exam_id' => $exam->exam_id]) }}" class="btn btn-info">
                  Edit Exam
                </a>

                <a href="{{ route('admin.exams.view_participation', ['exam_id' => $exam->exam_id]) }}" class="btn btn-info pull-right">
                  View Participation
                </a>
              </div>
            
          </div>

          <div class="col-md-2 col-md-offset-1">
            
          </div>
        </div>
      </div>

      <div class="white-box">
          <div class="row">
              
              <div class="col-md-3">
                  <p>Exam Type:<br>{{ $exam->exam_type }}</p>
              </div>

              <div class="col-md-3">
                <p>No of Questions:<br>{{ $exam->number_of_questions }}</p>
              </div>

              <div class="col-md-3">
                <p>Time Limit:<br>{{ $exam->time_limit }}</p>
              </div>
          </div>
      </div>

      <div class="white-box">
        <div class="row">
          <div class="col-md-12">
            <form action="{{ route('admin.exams.remove_participants', ['exam_id' => $exam->exam_id]) }}" method="post">
              {{ csrf_field() }}
              <div class="inner_nav {">
                @if(isset($participants) && $participants->count() > 0)
                <button type="submit" class="btn btn-info pull-right">Remove Selected</button>
                @endif
              </div>
            <h4>Participants</h4>
            @if(isset($participants) && $participants->count() > 0)
              <div class="">
                <table class="table table-striped table-responsive">
                  <thead>
                    <tr>
                      <th width="40%">Name</th>
                      <th width="45%">Email</th>
                      <th width="15%">
                        <label>
                          <input type="checkbox" name="select_all" id="select_all">
                          Select All
                        </label>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($participants as $participant)
                    <tr>
                      <td>{{ $participant->firstname }} {{ $participant->lastname }}</td>
                      <td>{{ $participant->email }}</td>
                      <td style="text-align:center">
                        <label>
                          <input type="checkbox" name="participants[]" value="{{ $participant->id }}">
                        </label>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
            <p>No prticipants have been added to this test.</p>
            @endif
            </form>
          </div>
        </div>
      </div>


    </div>  

  </div>

</div>

@endsection