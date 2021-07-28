<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Edit Collection</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          <li>
            <a href="{{ route('admin.collections.index') }}">Collections </a>
          </li>
          <li class="active">
            Edit Collection 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          
          <div class="col-md-12">
              
              <div class="white-box">
                  <form action="{{ route('admin.collections.update', ['id' => $collection->collection_id]) }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}
                    
                    <div class="row">

                      <!--<div class="col-md-10">
                        <div class="form-group">
                          <label for="program_id">Training Program</label>
                          <select name="program_id" class="form-control input-lg">
                            
                            @foreach ($training_programs as $program)
                            <option value="{{ $program->program_id }}" <?php if($collection->program_id == $program->program_id) echo 'selected' ?>>
                              {{ $program->program_name }}</option>
                            @endforeach
                            
                          </select>
                        </div>
                      </div>-->
                      
                      <div class="col-md-10">
                        <div class="form-group">
                          <label for="collection_title">Collection Title</label>
                          <input type="text" name="collection_title" class="form-control input-lg {{ $errors->has('collection_title') ? ' is-invalid' : '' }}" 
                          placeholder="Collection Title" value="{{ $collection->collection_title }}" required /> 
                          @if($errors->has('collection_title'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('collection_title') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                    </div>
                    
                    <div class="btn_wrap">
                      <button type="submit" class="btn btn-info btn-lg"> Update </button>
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
