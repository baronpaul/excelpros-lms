<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Delete Exam</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          <li>
            <a href="{{ route('admin.exams.index') }}">Exams </a>
          </li>
          <li class="active">
            Delete Exam 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          
          <div class="col-md-12">
              <div class="alert alert-danger">
                <p>You are attempting to delete an exam. Please note that this can not be reversed</p>
              </div>

              <div class="white-box">
                  <form action="{{ route('admin.exams.destroy') }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}

                    <input type="hidden" name="exam_id" value="{{ $exam->exam_id }}">

                    <div class="row">
                      
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exam_title">Exam Title</label>
                          <input type="text" name="exam_title" class="form-control input-lg" value="{{ $exam->exam_title }}" readonly /> 
                          
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exam_type">Exam Type</label>
                          <input type="text" name="exam_title" class="form-control input-lg" value="{{ $exam->exam_type }}" readonly />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="collection_id">Collection</label>
                          <select name="collection_id" class="form-control input-lg">
                            <option >Select</option>
                            @foreach($collections as $collection)
                            <option value="{{ $collection->collection_id }}" <?php if($exam->collection_id == $collection->collection_id) echo 'selected' ?>>
                              {{ $collection->collection_title }}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exam_status">Exam Status</label>
                          <select name="exam_status" class="form-control input-lg">
                            <option >Select</option>
                            
                            <option value="active" <?php if($exam->exam_status == 'active') echo 'selected' ?>>
                              active
                            </option>

                            <option value="inactive" <?php if($exam->exam_status == 'inactive') echo 'selected' ?>>
                              inactive
                            </option>

                            <option value="completed" <?php if($exam->exam_status == 'completed') echo 'selected' ?>>
                              completed
                            </option>
                            
                          </select>
                        </div>
                      </div>
                      
                    </div>

                    <div class="btn_wrap">
                      <button type="submit" class="btn btn-info btn-lg"> Delete Exam </button>

                      <a href="{{ URL::previous() }}" class="btn btn-info btn-lg">Back to Exam</a>
                    </div>

                  </form>
              </div>

          </div>
      </div>

    </div>  

  </div>
</div>

@endsection