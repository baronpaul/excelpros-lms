@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Change Profile Picture</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.facilitators.index') }}">Facilitators</a>
          </li>
          
          <li class="active">
            Change Profile Picture
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

              <form action="{{ route('admin.facilitators.update_picture') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="facilitator_id" value="{{ $facilitator->id }}" />
                
                <div class="row">

                  <div class="col-md-2 pull-right">
                    <div class="profile_pic">
                      <?php
                           if($facilitator->profile_pic == null || $facilitator->profile_pic == '') {
                               $profile_pic = 'uploads/no-photo.png';
                           }
                           else {
                               $profile_pic = $facilitator->profile_pic;
                           }
                      ?>
                       <img src="{{ asset($profile_pic) }}" />
                   </div>
                  </div>
                  
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control input-lg {{ $errors->has('name') ? ' is-invalid' : '' }}" 
                      placeholder="Name" value="{{ $facilitator->name }}" readonly /> 
                      
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="profile_pic">Profile Picture</label>
                      <input type="file" name="profile_pic" class="form-control input-lg {{ $errors->has('profile_pic') ? ' is-invalid' : '' }}" 
                      placeholder="Profile Picture" /> 
                      @if($errors->has('profile_pic'))
                        <span class="invalid-feedback red">
                          <strong>{{ $errors->first('profile_pic') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  
                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Change Picture </button>
                  <a href="{{ route('admin.facilitators.index') }}" class="btn btn-info btn-lg">Go Back</a>
                </div>

              </form>

            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

@endsection
