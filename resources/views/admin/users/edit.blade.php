@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  
  <div class="page-title-box">
      <h4 class="page-title">Edit Profile</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="">Dashboard</a>
          </li>
          <li>
            <a href="">Profile </a>
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
                  
                <form action="{{ route('admin.users.update') }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}

                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                    <div class="row">
                      
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="firstname">Select Training Program</label>
                          <select name="program_id" class="form-control">
                            <option>Select Program</option>
                            @foreach($training_programs as $training_program)
                              <option value="{{ $training_program->program_id }}" <?php if($user->program_id == $training_program->program_id) echo 'selected' ?>>
                                {{ $training_program->program_name }} - {{ $training_program->org_name }}
                              </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="firstname">First Name</label>
                          <input type="text" name="firstname" class="form-control input-lg {{ $errors->has('firstname') ? ' is-invalid' : '' }}" 
                          placeholder="First Name" value="{{ $user->firstname }}" required /> 
                          @if($errors->has('firstname'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="lastname">Last Name</label>
                          <input type="text" name="lastname" class="form-control input-lg {{ $errors->has('lastname') ? ' is-invalid' : '' }}" 
                          placeholder="Last Name" value="{{ $user->lastname }}" required /> 
                          @if($errors->has('lastname'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" name="email" class="form-control input-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                          placeholder="Email" value="{{ $user->email }}" required /> 
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
                          placeholder="Phone" value="{{ $user->phone }}" required /> 
                          @if($errors->has('phone'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                    </div>
                    <div class="btn_wrap">
                      <button type="submit" class="btn btn-info btn-lg"> Update Profile </button>
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