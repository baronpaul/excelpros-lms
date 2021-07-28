@extends('facilitator.layouts.facilitatorlayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">My Profile</h4>
        
      <ol class="breadcrumb">
            <li>
                <a href="{{ route('facilitator.home') }}">Dashboard</a>
            </li> 
            
            <li>
                <a href="{{ route('facilitator.profile.index') }}">Profile</a>
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
                  
                    <form action="{{ route('facilitator.profile.update') }}" method="post" enctype="multipart/form-data">
                  
                        {{ csrf_field() }}
    
                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" name="name" class="form-control input-lg {{ $errors->has('name') ? ' is-invalid' : '' }}" 
                              placeholder="Name" value="{{ $facilitator->name }}" required /> 
                              @if($errors->has('name'))
                                <span class="invalid-feedback red">
                                  <strong>{{ $errors->first('name') }}</strong>
                                </span>
                              @endif
                            </div>
                          </div>
    
    
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="text" name="email" class="form-control input-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                              placeholder="Amount Requested" value="{{ $facilitator->email }}" required /> 
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
                              placeholder="Phone" value="{{ $facilitator->phone }}" required /> 
                              @if($errors->has('phone'))
                                <span class="invalid-feedback red">
                                  <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                              @endif
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="brief_bio">Brief Bio</label>
                              <textarea name="brief_bio" class="form-control" id="summernote"></textarea> 
                              @if($errors->has('brief_bio'))
                                <span class="invalid-feedback red">
                                  <strong>{{ $errors->first('brief_bio') }}</strong>
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

@include('admin.includes.js_includes')

</body>
</html>
