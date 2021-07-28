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
                
                <form action="{{ route('admin.exams.filtered_view', ['id' => $exam->exam_id]) }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    
                    <div class="col-md-4">
                    <div class="form-group">
                        <select name="min_score" class="form-control">
                        <option value="">Select Min Score</option>
                        <option value="50">50</option>
                        <option value="60">60</option>
                        <option value="70">70</option>
                        <option value="80">80</option>
                        <option value="90">90</option>
                        <option value="100">100</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <button type="submit" class="btn btn-info">Display Results</button>
                    
                    <a href="{{ route('admin.exams.clear_filtered_view', ['id' => $exam->exam_id]) }}" class="btn btn-info">Clear Filter</a>
                    </div>
                    
                </div>
                </form>
            </div>

            <div class="col-md-2 col-md-offset-1">
                
            </div>
            </div>
        </div>

        <div class="white-box">
            <div class="row">
                <div class="col-md-12 tasks_wrap">

                    <h4>Participants who have taken the test.</h4>
                    @if (isset($participations) && $participations->count() > 0)
                        <div class="row">
                            <div class="col-md-8">
                                <h5>Participants: {{ $total_participations }}</h5>
                                <h5>Completed: {{ $total_completed }}</h5>
                            </div>

                        </div>
                        

                        <div class="responsive-table">
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th width="22%">Name</th>
                                        <th width="20%">Time Started</th>
                                        <th width="20%">Time Completed</th>
                                        <th width="10%">Attempts</th>
                                        <th width="7.5%">Graded</th>
                                        <th width="7.5%">Score</th>
                                        <th width="12.5%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participations as $participation)
                                    <tr>
                                        
                                        <td>
                                            {{ $participation->firstname }} {{ $participation->lastname }}
                                        </td>
                                        
                                        <td>{{ $participation->started_at }}</td>

                                        <td>{{ $participation->completed_at }}</td>

                                        <td>{{ $participation->attempts }}</td>

                                        <td>{{ $participation->graded }}</td>

                                        <td>{{ $participation->score }}</td>

                                        <td class="text-center">
                                            <div class="edit-btn-wrap">
                                                
                                                <div class="edit-btn">
                                                    <a href="{{ route('admin.participations.detail', ['id' => $participation->id]) }}" title="Details">
                                                        <img src="{{ asset('images/details_icon.png') }}"/> 
                                                    </a>
                                                </div>

                                                <div class="edit-btn">
                                                    <a href="{{ route('admin.participations.export_detail', ['id' => $participation->id]) }}" title="Export to PDF">
                                                        <img src="{{ asset('images/pdf-icon.png') }}"/> 
                                                    </a>
                                                </div>

                                                @if(Auth::guard('admin')->user()->permission == 3)
                                                <div class="edit-btn">
                                                    <a href="{{ route('admin.participations.delete_participation', ['id' => $participation->id]) }}" title="Delete">
                                                        <img src="{{ asset('images/delete_icon.png') }}"/> 
                                                    </a>
                                                </div>
                                                @endif
            
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    @else
                        <p>There are no records of exam participation to display</p>
                    @endif

                    <br>
                    
                    <div class="btn-wrap">
                        <a href="{{ route('admin.exams.export_filtered', ['id' => $exam->exam_id]) }}" 
                            class="btn btn-info btn-lg pull-right" style="margin-left: 10px">
                            Export to Excel
                        </a>

                        <a href="{{ route('admin.exams.index') }}" class="btn btn-info btn-lg pull-right">
                            Back to All Exam
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>  

  </div>

</div>

@endsection