@extends('admin.layouts.sitelayout')

@section('content')

<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Delete Organization</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.organizations.index') }}">Orgnizations</a>
          </li>
          
          <li class="active">
            Delete Organization
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">
              <div class="alert alert-danger">
                You are about the remove an organization along with all its data. Please note that this action cannot be reversed once it is done, 
                so proceed with caution.
              </div>
              <form action="{{ route('admin.organizations.destroy') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="org_id" value="{{ $organization->org_id }}">
                
                <div class="row">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="org_name">Organization Name</label>
                      <input type="text" name="org_name" class="form-control input-lg" 
                      placeholder="Organization Name" value="{{ $organization->org_name }}" readonly /> 
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="contact_person">Contact Person</label>
                      <input type="text" name="contact_person" class="form-control input-lg {{ $errors->has('contact_person') ? ' is-invalid' : '' }}" 
                      placeholder="Contact Person" value="{{ $organization->contact_person }}" readonly /> 
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" class="form-control input-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                      placeholder="Email" value="{{ $organization->email }}" readonly /> 
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" name="phone" class="form-control input-lg {{ $errors->has('phone') ? ' is-invalid' : '' }}" 
                      placeholder="Phone" value="{{ $organization->phone }}" readonly /> 
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" name="address" class="form-control input-lg {{ $errors->has('address') ? ' is-invalid' : '' }}" 
                      placeholder="Address" value="{{ $organization->address }}" readonly /> 
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="logo">Logo</label>
                      <input type="file" name="logo" class="form-control input-lg" placeholder="Logo" /> 
                    </div>
                  </div>

                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Remove Organization </button>
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

