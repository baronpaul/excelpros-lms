@extends('organization.layouts.mainsite')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Profile</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('organization.dashboard') }}">Dashboard </a>
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
                  <div class="profile_wrapper">

                    <div class="row">

                        <div class="col-md-2">
                            <div class="profile_pic">
                               <?php
                                    if($organization->logo == null || $organization->logo == '') {
                                        $org_logo = 'uploads/no-photo.png';
                                    }
                                    else {
                                        $org_logo = $organization->logo;
                                    }
                               ?>
                                <img src="{{ asset($org_logo) }}" />
                                
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="profile_info">
                              
                                <h4>{{ $organization->org_name }}</h4>
                                
                                <p>
                                    <i class="lnr lnr-user"></i> 
                                    {{ $organization->contact_person }}
                                </p>

                                <p>
                                    <i class="lnr lnr-map-marker"></i> 
                                    {{ $organization->address }}
                                </p>

                                <p>
                                    <i class="lnr lnr-envelope"></i> 
                                    {{ $organization->email }}
                                </p>

                                <p>
                                    <i class="lnr lnr-phone"></i> 
                                    {{ $organization->phone }}
                                </p>

                            </div>

                            <hr>

                            <div class="">
                              <a href="{{ route('organization.profile.edit') }}" class="btn btn-info">
                                Edit Profile
                              </a>

                              <a href="{{ route('organization.profile.change_password') }}" class="btn btn-info">
                                Change Password
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
