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
                  <form action="{{ route('admin.users.do_upload_users') }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="firstname">Select Training Program</label>
                          <select name="program_id" class="form-control">
                            @foreach($training_programs as $training_program)
                              <option value="{{ $training_program->program_id }}">{{ $training_program->program_name }} - {{ $training_program->org_name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="uploaded_file">Upload File</label>
                          <input type="file" name="uploaded_file" class="form-control input-lg {{ $errors->has('uploaded_file') ? ' is-invalid' : '' }}" 
                          placeholder="Uploaded file" value="{{ old('uploaded_file') }}" required /> 
                          @if($errors->has('uploaded_file'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('uploaded_file') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                    </div>
                    <div class="btn_wrap">
                      <button type="submit" class="btn btn-info btn-lg"> Upload Users </button>
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
