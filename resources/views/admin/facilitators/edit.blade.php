@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Edit facilitator</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.facilitators.index') }}">Facilitators</a>
          </li>
          
          <li class="active">
            Edit facilitator
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

              <form action="{{ route('admin.facilitators.update') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="facilitator_id" value="{{ $facilitator->id }}" />
                
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
                      placeholder="Email" value="{{ $facilitator->email }}" required /> 
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

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="brief_bio">Brief Bio</label>
                      <textarea name="brief_bio" class="form-control" rows="7" 
                      placeholder="Brief Bio of Facilitator">{{ $facilitator->brief_bio }}</textarea>
                    </div>
                  </div>

                  
                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Edit Facilitator </button>
                  <a href="{{ route('admin.facilitators.index') }}" class="btn btn-info btn-lg">Go Back</a>
                </div>

              </form>

            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

@endsection
