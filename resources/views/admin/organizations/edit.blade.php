@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Edit Organization</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.organizations.index') }}">Orgnizations</a>
          </li>
          
          <li class="active">
            Edit Organization
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

              <form action="{{ route('admin.organizations.update') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="org_id" value="{{ $organization->org_id }}">
                
                <div class="row">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="org_name">Orgnization Name</label>
                      <input type="text" name="org_name" class="form-control input-lg {{ $errors->has('org_name') ? ' is-invalid' : '' }}" 
                      placeholder="Orgnization Name" value="{{ $organization->org_name }}" required /> 
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
                      placeholder="Email" value="{{ $organization->email }}" required /> 
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
                      placeholder="Address" value="{{ $organization->address }}" /> 
                      @if($errors->has('address'))
                        <span class="invalid-feedback red">
                          <strong>{{ $errors->first('address') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="logo">Status</label>
                      <select name="status" class="form-control">
                        <option value="active" <?php if($organization->status == 'active') echo 'selected' ?>>active</option>
                        <option value="inactive" <?php if($organization->status == 'inactive') echo 'selected' ?>>inactive</option>
                      </select>
                    </div>
                  </div>

                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Update Orgnization </button>
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

