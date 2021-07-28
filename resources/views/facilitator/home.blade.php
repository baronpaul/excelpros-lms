@extends('facilitator.layouts.facilitatorlayout')

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
                    <h4>Welcome, {{ auth()->guard('facilitator')->user()->name }} (Facilitator)</h4><br><br>
                    <div class="content_area">

                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="dash-box">
                                    <a href="{{ route('facilitator.courses.index') }}">
                                        <div class="dash-icon">
                                            <img src="{{ asset('images/courses.png') }}" />
                                        </div>
                                        <div class="dash-text">Courses</div>
                                    </a>
                                </div>
                            </div>
        
                            
        
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="dash-box">
                                    <a href="{{ route('facilitator.assessment.index') }}">
                                        <div class="dash-icon">
                                            <img src="{{ asset('images/exam.png') }}" />
                                        </div>
                                        <div class="dash-text">Assessment</div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="dash-box">
                                    <a href="{{ route('facilitator.evaluations.index') }}">
                                        <div class="dash-icon">
                                            <img src="{{ asset('images/evaluation.png') }}" />
                                        </div>
                                        <div class="dash-text">Evaluations</div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="dash-box">
                                    <a href="{{ route('facilitator.profile.index') }}">
                                        <div class="dash-icon">
                                            <img src="{{ asset('images/teacher.png') }}" />
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

