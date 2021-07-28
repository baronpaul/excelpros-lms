<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Edit Portal Administrator</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          <li>
            <a href="{{ route('admin.portal_admins.index') }}">Portal Administrator </a>
          </li>
          <li class="active">
            Edit Portal Administrator 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          
          <div class="col-md-12">
              <div class="alert alert-danger">
                <p>You are attempting to delete a portal administrator. Please note that this can not be reversed</p>
              </div>

              <div class="white-box">
                  <form action="{{ route('admin.portal_admins.destroy', ['id', $admin->id]) }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}

                    <input type="hidden" name="id" value="{{ $admin->id }}" >

                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" name="name" class="form-control input-lg" 
                          placeholder="Name" value="{{ $admin->name }}" readonly /> 
                          
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" name="email" class="form-control input-l" 
                          placeholder="Email" value="{{ $admin->email }}" readonly /> 
                        </div>
                      </div>


                    </div>
                    <div class="btn_wrap">
                      <button type="submit" class="btn btn-info btn-lg"> Delete Administrator </button>
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