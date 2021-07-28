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
                            <h3>Participants</h3>
        
                            @if (isset($participations) && $participations->count() > 0)
                                
                                <div class="responsive-table">
                                    <table class="table table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th width="40%">Name</th>
                                                <th width="15%">Graded</th>
                                                <th width="15%">Score</th>
                                                <th width="15%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($participations as $participation)
                                            <tr>
                                                
                                                <td>
                                                    {{ $participation->firstname }} {{ $participation->lastname }}
                                                </td>
                                                
                                                <td>{{ $participation->graded }}</td>
        
                                                <td>{{ $participation->score }}</td>
        
                                                <td class="text-center">
                                                    <div class="edit-btn-wrap">
                                                        
                                                        <div class="edit-btn">
                                                            <a href="{{ route('organization.assessment.participation_detail', ['id' => $participation->id]) }}" 
                                                                title="Participation Detail">
                                                                <img src="{{ asset('images/details_icon.png') }}"/> 
                                                            </a>
                                                        </div>
        
                                                        <div class="edit-btn">
                                                            <a href="{{ route('organization.assessment.export_participation', ['id' => $participation->id]) }}" 
                                                                title="Export to PDF">
                                                                <img src="{{ asset('images/pdf-icon.png') }}"/> 
                                                            </a>
                                                        </div>
                    
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
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>  

  </div>
</div>

@endsection
