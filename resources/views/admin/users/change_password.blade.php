@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  
  <div class="page-title-box">
      <h4 class="page-title">Change Password</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="#">Profile </a>
          </li>

          <li class="active">
            Change Password
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>


  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          
          <div class="col-md-12">
              
              <div class="white-box">
                  
                <form action="{{ route('admin.users.update_password') }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}

                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="firstname">First Name</label>
                          <input type="text" name="firstname" class="form-control input-lg {{ $errors->has('firstname') ? ' is-invalid' : '' }}" 
                          placeholder="First Name" value="{{ $user->firstname }}" readonly /> 
                          
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="lastname">Last Name</label>
                          <input type="text" name="lastname" class="form-control input-lg {{ $errors->has('lastname') ? ' is-invalid' : '' }}" 
                          placeholder="Last Name" value="{{ $user->lastname }}" readonly /> 
                          
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="new_password">New Password</label>
                          <input type="password" name="new_password" class="form-control input-lg {{ $errors->has('new_password') ? ' is-invalid' : '' }}" 
                          placeholder="new_password" required /> 
                          @if($errors->has('new_password'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('new_password') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="password_confirmation">Confirm Password</label>
                          <input type="password" name="password_confirmation" class="form-control input-lg {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" 
                          placeholder="password_confirmation" required /> 
                        </div>
                      </div>

                    </div>
                    <div class="btn_wrap">
                      <button type="submit" class="btn btn-info btn-lg"> Update Password </button>
                      <a href="{{ URL::previous() }}" class="btn btn-info btn-lg">Go Back</a>
                    </div>

                  </form>

              </div>
              
          </div>
      </div>

    </div>  

  </div>

</div>

@endsection

