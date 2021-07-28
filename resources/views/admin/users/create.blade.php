<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Add Users</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          <li>
            <a href="{{ route('admin.portal_admins.index') }}">Users </a>
          </li>
          <li class="active">
            Add Users 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          
          <div class="col-md-12">
              
              <div class="white-box">
                  <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="firstname">Select Training Program</label>
                          <select name="program_id" class="form-control">
                            @foreach($training_programs as $training_program)
                              <option value="{{ $training_program->program_id }}">{{ $training_program->program_name }} - {{ $training_program->org_name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="firstname">First Name</label>
                          <input type="text" name="firstname" class="form-control input-lg {{ $errors->has('firstname') ? ' is-invalid' : '' }}" 
                          placeholder="First firstName" value="{{ old('firstname') }}" required /> 
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
                          placeholder="Last lastName" value="{{ old('lastname') }}" required /> 
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
                          placeholder="Phone" value="{{ old('phone') }}" /> 
                          @if($errors->has('phone'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <!--
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" name="password" class="form-control input-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" 
                          placeholder="password" value="{{ old('password') }}" required /> 
                          @if($errors->has('password'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('password') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="password_confirm">Password Confirm</label>
                          <input type="password" name="password_confirm" class="form-control input-lg {{ $errors->has('password_confirm') ? ' is-invalid' : '' }}" 
                          placeholder="password confirm" value="{{ old('password_confirm') }}" required /> 
                          @if($errors->has('password_confirm'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('password_confirm') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>
                    -->

                    </div>
                    <div class="btn_wrap">
                      <button type="submit" class="btn btn-info btn-lg"> Create </button>
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

