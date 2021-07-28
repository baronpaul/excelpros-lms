@extends('layouts.sitelayout')

@section('content')


<div class="sec_content">
  
  <div class="page-title-box">
      <h4 class="page-title">Edit Profile</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="">Dashboard</a>
          </li>
          <li>
            <a href="">Profile </a>
          </li>
          <li class="active">
            Edit Profile 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>


  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          
          <div class="col-md-12">
              
              <div class="white-box">
                  
                <form action="{{ route('user.update_profile') }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}

                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="firstname">First Name</label>
                          <input type="text" name="firstname" class="form-control input-lg {{ $errors->has('firstname') ? ' is-invalid' : '' }}" 
                          placeholder="First Name" value="{{ $user->firstname }}" required /> 
                          @if($errors->has('firstname'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="lastname">Last Name</label>
                          <input type="text" name="lastname" class="form-control input-lg {{ $errors->has('lastname') ? ' is-invalid' : '' }}" 
                          placeholder="Last Name" value="{{ $user->lastname }}" required /> 
                          @if($errors->has('lastname'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" name="email" class="form-control input-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                          placeholder="Amount Requested" value="{{ $user->email }}" required /> 
                          @if($errors->has('email'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('email') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                    </div>
                    <div class="btn_wrap">
                      <button type="submit" class="btn btn-info btn-lg"> Update Profile </button>
                    </div>

                  </form>

              </div>
              
          </div>
      </div>

    </div>  

  </div>

</div>

@endsection