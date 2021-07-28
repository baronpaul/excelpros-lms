@extends('organization.layouts.mainsite')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Facilitator</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('organization.dashboard') }}">Dashboard </a>
          </li>

          <li class="active">
            Courses 
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
                    <hr>
                    <div class="content_area">
                      
                        <div class="profile_wrap">
                            <div class="row">
                              <div class="col-md-3">
                                <div class="profile_pix">
                                  <div class="profile_pix_ins">
                                    <img src="{{ asset($facilitator->profile_pic) }}">
                                  </div>
                                </div>
                              </div>
      
                              <div class="col-md-8">
                                <div class="profile_details">
                                  
                                  <h3>{{ $facilitator->name }}</h3>
                                  <h5>Email: {{ $facilitator->email }}</h5>
                                  <h5>Phone: {{ $facilitator->phone }}</h5><br>
    
                                  <div class="well">
                                      <h5>Brief Bio</h5>
                                      <article>{!! $facilitator->brief_bio !!}</article>
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

  </div>
</div>

@endsection
