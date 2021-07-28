@extends('layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">My Profile</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="">Dashboard</a>
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
                        <div class="col-md-4">
                          <div class="profile_pix">
                            <div class="profile_pix_ins">
                              <img src="{{ asset($user->picture) }}">
                            </div>

                            <div class="profile_pix_btn">
                              <a href="{{ route('user.edit_picture', ['id' => $user->id]) }}">Change Image</a>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-7">
                          <div class="profile_details">
                            
                            <h3>{{ $user->firstname }}  {{ $user->lastname }}</h3>
                            <h5>Email: {{ $user->email }}</h5>
                            <h5>Phone: {{ $user->phone }}</h5>
                            <h5>Role: {{ $user->role_title }}</h5>
                            <hr>
                            <br>
                            <div class="btn_wrap">
                              <a href="{{ route('user.edit_profile') }}" class="btn btn-info btn-lg">Edit Profile</a>
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