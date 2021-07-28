<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Add Portal Administrator</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          <li>
            <a href="{{ route('admin.portal_admins.index') }}">Portal Administrator </a>
          </li>
          <li class="active">
            Add Portal Administrator 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          
          <div class="col-md-12">
              
              <div class="white-box">
                  <form action="{{ route('admin.portal_admins.store') }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}

                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" name="name" class="form-control input-lg {{ $errors->has('name') ? ' is-invalid' : '' }}" 
                          placeholder="Name" value="{{ old('name') }}" required /> 
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
                          <label for="permission">Permission</label>
                          <select name="permission" class="form-control input-lg">
                            <option >Select Permission</option>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->permission_id }}">
                                  {{ $permission->permission_title }}
                                </option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                    </div>
                    <div class="btn_wrap">
                      <button type="submit" class="btn btn-info btn-lg"> Create Administrator </button>
                    </div>

                  </form>
              </div>

          </div>
      </div>

    </div>  

  </div>
</div>

@endsection