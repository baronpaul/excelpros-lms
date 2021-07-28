@extends('organization.layouts.mainsite')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Dashboard</h4>
        
      <ol class="breadcrumb">
          <li class="active">
            Dashboard 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h4>Welcome, {{ auth()->guard('organization')->user()->contact_person }} ({{ auth()->guard('organization')->user()->org_name }})</h4><br><br>
                    <div class="content_area">

                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="dash-box">
                                    <a href="{{ route('organization.courses.index') }}">
                                        <div class="dash-icon">
                                            <img src="{{ asset('images/courses.png') }}" />
                                        </div>
                                        <div class="dash-text">Courses</div>
                                    </a>
                                </div>
                            </div>
        
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="dash-box">
                                    <a href="{{ route('organization.participants.index') }}">
                                        <div class="dash-icon">
                                            <img src="{{ asset('images/student.png') }}" />
                                        </div>
                                        <div class="dash-text">Participants</div>
                                    </a>
                                </div>
                            </div>
        
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="dash-box">
                                    <a href="{{ route('organization.assessment.index') }}">
                                        <div class="dash-icon">
                                            <img src="{{ asset('images/exam.png') }}" />
                                        </div>
                                        <div class="dash-text">Assessment</div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="dash-box">
                                    <a href="{{ route('organization.profile') }}">
                                        <div class="dash-icon">
                                            <img src="{{ asset('images/leader.png') }}" />
                                        </div>
                                        <div class="dash-text">Profile</div>
                                    </a>
                                </div>
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


