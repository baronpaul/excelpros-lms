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
            <a href="{{ route('admin.organizations.index') }}">Orgnizations</a>
          </li>
          
          <li class="active">
            Change Password
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

              <form action="{{ route('admin.organizations.update_password') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="org_id" value="{{ $organization->org_id }}">
                
                <div class="row">
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="org_name">Orgnization Name</label>
                      <input type="text" name="org_name" class="form-control input-lg {{ $errors->has('org_name') ? ' is-invalid' : '' }}" 
                      placeholder="Orgnization Name" value="{{ $organization->org_name }}" readonly /> 
                      @if($errors->has('org_name'))
                        <span class="invalid-feedback red">
                          <strong>{{ $errors->first('org_name') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="password">New Password</label>
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
                      <label for="password_confirm">Password Confirmation</label>
                      <input type="password" name="password_confirm" class="form-control input-lg {{ $errors->has('password_confirm') ? ' is-invalid' : '' }}" 
                      placeholder="Password Confirmation" value="{{ old('password_confirm') }}" required /> 
                      @if($errors->has('password_confirm'))
                        <span class="invalid-feedback red">
                          <strong>{{ $errors->first('password_confirm') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Update Password </button>
                  <a href="{{ route('admin.organizations.index') }}" class="btn btn-info btn-lg">Go Back</a>
                </div>

              </form>

            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

@endsection

