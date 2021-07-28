@extends('organization.layouts.mainsite')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Edit Profile</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('organization.dashboard') }}">Dashboard </a>
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
                    <h4>Welcome, {{ auth()->guard('organization')->user()->contact_person }} ({{ auth()->guard('organization')->user()->org_name }})</h4>
                    <hr>
                    <form action="{{ route('organization.profile.update') }}" method="post" enctype="multipart/form-data">
                    
                      {{ csrf_field() }}

                      <div class="row">
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="org_name">Organization Name</label>
                            <input type="text" name="org_name" class="form-control input-lg {{ $errors->has('org_name') ? ' is-invalid' : '' }}" 
                            placeholder="Organization Name" value="{{ $organization->org_name }}" readonly /> 
                            @if($errors->has('org_name'))
                              <span class="invalid-feedback red">
                                <strong>{{ $errors->first('org_name') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="contact_person">Contact Person</label>
                            <input type="text" name="contact_person" class="form-control input-lg {{ $errors->has('contact_person') ? ' is-invalid' : '' }}" 
                            placeholder="Contact Person" value="{{ $organization->contact_person }}" required /> 
                            @if($errors->has('contact_person'))
                              <span class="invalid-feedback red">
                                <strong>{{ $errors->first('contact_person') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>


                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control input-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                            placeholder="Amount Requested" value="{{ $organization->email }}" required /> 
                            @if($errors->has('email'))
                              <span class="invalid-feedback red">
                                <strong>{{ $errors->first('email') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control input-lg {{ $errors->has('phone') ? ' is-invalid' : '' }}" 
                            placeholder="Phone" value="{{ $organization->phone }}" required /> 
                            @if($errors->has('phone'))
                              <span class="invalid-feedback red">
                                <strong>{{ $errors->first('phone') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control input-lg {{ $errors->has('address') ? ' is-invalid' : '' }}" 
                            placeholder="Address" value="{{ $organization->address }}" required /> 
                            @if($errors->has('address'))
                              <span class="invalid-feedback red">
                                <strong>{{ $errors->first('address') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                      </div>
                      <div class="btn_wrap">
                        <button type="submit" class="btn btn-primary btn-lg"> Update Profile </button>
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
