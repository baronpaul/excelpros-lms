@extends('admin.layouts.sitelayout')

@section('content')

<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Change Logo</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.organizations.index') }}">Orgnizations</a>
          </li>
          
          <li class="active">
            Change Logo
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

              <form action="{{ route('admin.organizations.update_logo') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="org_id" value="{{ $organization->org_id }}">
                
                <div class="row">

                  <div class="col-md-2 pull-right">
                    <div class="profile_pic">
                      <?php
                           if($organization->logo == null || $organization->logo == '') {
                               $org_logo = 'uploads/no-photo.png';
                           }
                           else {
                               $org_logo = $organization->logo;
                           }
                      ?>
                       <img src="{{ asset($org_logo) }}" />
                   </div>
                  </div>
                  
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="org_name">Orgnization Name</label>
                      <input type="text" name="org_name" class="form-control input-lg" 
                      placeholder="Orgnization Name" value="{{ $organization->org_name }}" readonly />
                    </div>
                  </div>

                  <div class="col-md-8">
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
                  <button type="submit" class="btn btn-info btn-lg"> Update Logo </button>
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

