@extends('facilitator.layouts.facilitatorlayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">My Profile</h4>
        
      <ol class="breadcrumb">
            <li>
                <a href="{{ route('facilitator.home') }}">Dashboard</a>
            </li>  
            <li class="active">
                Profile 
            </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <div class="row">
                      <div class="col-md-12"><h3>My Profile</h3><br></div>
  
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
                              <hr>
                              
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

@include('admin.includes.js_includes')

</body>
</html>
