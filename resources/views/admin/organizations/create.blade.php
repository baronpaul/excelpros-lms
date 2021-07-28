@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Add Organization</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.organizations.index') }}">Orgnizations</a>
          </li>
          
          <li class="active">
            Add Organization
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

              <form action="{{ route('admin.organizations.store') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}
                
                <div class="row">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="org_name">Orgnization Name</label>
                      <input type="text" name="org_name" class="form-control input-lg {{ $errors->has('org_name') ? ' is-invalid' : '' }}" 
                      placeholder="Orgnization Name" value="{{ old('org_name') }}" required /> 
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
                      placeholder="Contact Person" value="{{ old('contact_person') }}" required /> 
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
                      placeholder="Email" value="{{ old('email') }}" required /> 
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
                      placeholder="Phone" value="{{ old('phone') }}" required /> 
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
                      placeholder="Address" value="{{ old('address') }}" /> 
                      @if($errors->has('address'))
                        <span class="invalid-feedback red">
                          <strong>{{ $errors->first('address') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="logo">Logo</label>
                      <input type="file" name="logo" class="form-control input-lg {{ $errors->has('logo') ? ' is-invalid' : '' }}" 
                      placeholder="Logo" value="{{ old('logo') }}" /> 
                      @if($errors->has('logo'))
                        <span class="invalid-feedback red">
                          <strong>{{ $errors->first('logo') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Create </button>
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
