<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Delete Question</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          <li>
            <a href="{{ route('admin.questions.index') }}">Questions </a>
          </li>
          <li class="active">
            Delete Question 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          
          <div class="col-md-12">
              <div class="alert alert-danger">
                <p>You are attempting to delete a question. Please note that this can not be reversed</p>
              </div>

              <div class="white-box">
                  <form action="{{ route('admin.questions.destroy', ['id' => $question->question_id]) }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}
                    
                    <div class="row">
                      
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="question_title">Question</label>
                          
                          <textarea name="question_title" id="summernote" class="form-control" rows="5">{{ $question->question_name }}</textarea>
                          
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