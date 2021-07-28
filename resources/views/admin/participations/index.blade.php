<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Exam Participation</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          
          <li class="active">
            Exam Participation
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      <div class="white-box">
        <div class="row">
          <div class="col-md-12">
            
            <form action="{{ route('admin.participations.filtered') }}" method="POST">
            {{ csrf_field() }}
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <select name="exam_id" class="form-control">
                      <option value="">Select exam</option>
                      <?php
                          $exams = DB::table('exams')->get();
                      ?>
                      @foreach ($exams as $exam)
                      <option value="{{ $exam->exam_id }}">{{ $exam->exam_title }}</option>
                      @endforeach                    
                    </select>
                  </div>
                </div>

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

                  <a href="{{ URL::previous() }}" class="btn btn-info">Clear Filter</a>
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

              <div class="task_wrap_title">Participations</div>
                @if (isset($participations) && $participations->count() > 0)
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="25%">Exam</th>
                                <th width="20%">Name</th>
                                <th width="20%">Started</th>
                                <th width="20%">Completed</th>
                                <th width="15%">Score</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($participations as $participation)
                            <tr>
                                <td>{{ $participation->exam_title }}</td>
                                
                                <td>
                                  {{ $participation->firstname }} {{ $participation->lastname }}
                                </td>
                                
                                <td>{{ $participation->started_at }}</td>

                                <td>{{ $participation->completed_at }}</td>

                                <td>{{ $participation->score }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="btn-wrap"><br>
                      <div class="top-btn">
                        <a href="{{ route('admin.participations.export_filtered') }}" class="btn btn-info">
                          Export to Excel</a>
                      </div>
                    </div>
                @else
                    <p>There are record of exam participations to display</p>
                @endif
            </div>


        </div>
      </div>

    </div>  

  </div>

</div>

@endsection