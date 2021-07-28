@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">User Detail</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('home') }}">Dashboard</a>
          </li>
          <li>
            <a href="{{ route('admin.users.index') }}">Users </a>
          </li>
          <li class="active">
            {{ $user->firstname }}
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
                      <div class="col-md-3">
                          <div class="profile_pix">
                            <div class="profile_pix_ins">
                                <img src="{{ asset($user->profile_pic) }}">
                            </div>
                          </div>
                          
                      </div>

                      <div class="col-md-9">
                          
                          <div class="req_detail_card">     
                            <h4>{{ $user->firstname }} {{ $user->lastname }}</h4> 
                            <div class="req_detail_itm row">
                                <span class="req_detail_label col-md-3">Email: </span>
                                <span class="req_detail_txt col-md-8">{{ $user->email }}</span>
                            </div>

                            <div class="req_detail_itm row">
                                <span class="req_detail_label col-md-3">Phone: </span>
                                <span class="req_detail_txt col-md-8">{{ $user->phone }}</span>
                            </div>


                        </div>
                      </div>
                  </div>
                  
              </div>


              <div class="white-box"> 
                <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-info btn-lg">Edit Profile</a>
                <a href="{{ route('admin.users.edit_picture', ['id' => $user->id]) }}" class="btn btn-info btn-lg">Change Profile Pic</a>
                <a href="{{ URL::previous() }}" class="btn btn-info btn-lg pull-right">Go Back</a>
              </div>

          </div>
      </div>

    </div>  

  </div>
</div>

@endsection
