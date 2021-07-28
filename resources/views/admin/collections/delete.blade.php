<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Delete Collection</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          <li>
            <a href="{{ route('admin.collections.index') }}">Collections </a>
          </li>
          <li class="active">
            Delete Collection 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          
          <div class="col-md-12">
              <div class="alert alert-danger">
                <p>You are attempting to delete a collection of questions. Please note that this can not be reversed</p>
              </div>

              <div class="white-box">
                  <form action="{{ route('admin.collections.destroy', ['id' => $collection->collection_id]) }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}
                    
                    <div class="row">
                      
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="collection_title">Collection Title</label>
                          <input type="text" name="collection_title" class="form-control input-lg {{ $errors->has('collection_title') ? ' is-invalid' : '' }}" 
                          placeholder="Collection Title" value="{{ $collection->collection_title }}" readonly /> 
                          @if($errors->has('collection_title'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('collection_title') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                    </div>
                    
                    <div class="btn_wrap">
                      <button type="submit" class="btn btn-info btn-lg"> Delete </button>
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