@extends('organization.layouts.mainsite')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Change Password</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('organization.dashboard') }}">Dashboard </a>
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
                  <h4>Welcome, {{ auth()->guard('organization')->user()->contact_person }} ({{ auth()->guard('organization')->user()->org_name }})</h4>
                  <hr>

                  <form action="{{ route('organization.profile.update_password') }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}

                    <input type="hidden" name="id" value="{{ Auth::guard('organization')->user()->id }}">

                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="password">New Pasword</label>
                          <input type="password" name="password" class="form-control input-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" 
                          placeholder="Password" value="{{ old('password') }}" required />
                          @if($errors->has('password'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('password') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="password-confirm">Password Confirm</label>
                          <input type="password" name="password_confirm" class="form-control input-lg {{ $errors->has('password_confirm') ? ' is-invalid' : '' }}" 
                          placeholder="Password Confirm" value="{{ old('password_confirm') }}" required /> 
                          @if($errors->has('password_confirm'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('password_confirm') }}</strong>
                            </span>
                          @endif
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
