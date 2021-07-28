<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Edit Question</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          <li>
            <a href="{{ route('admin.questions.index') }}">Questions </a>
          </li>
          <li class="active">
            Edit Question 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          
          <div class="col-md-12">
              
              <div class="white-box">
                  <form action="{{ route('admin.questions.update') }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}

                    <input type="hidden" name="question_id" value="{{ $question->question_id }}">

                    <input type="hidden" name="collection_id" value="{{ $question->collection_id }}">
                    
                    <div class="row">
                      
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="question_name">Question</label>
                          <textarea name="question_name" id="summernote" class="form-control" rows="4" placeholder="Question Title" required>
                            {{ $question->question_name }}
                          </textarea> 
                          @if($errors->has('question_name'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('question_name') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="question_image">Question Image</label>
                          <input type="file" name="question_image" class="form-control">
                        </div>
                      </div>

                      

                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="answer1">Answer A</label>
                          <input type="text" name="answer1" class="form-control input-lg {{ $errors->has('answer1') ? ' is-invalid' : '' }}" 
                          placeholder="Answer A" value="{{ $question->answer1 }}" /> 
                          @if($errors->has('answer1'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('answer1') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="answer2">Answer B</label>
                          <input type="text" name="answer2" class="form-control input-lg {{ $errors->has('answer2') ? ' is-invalid' : '' }}" 
                          placeholder="Answer B" value="{{ $question->answer2 }}" /> 
                          @if($errors->has('answer2'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('answer2') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="answer3">Answer C</label>
                          <input type="text" name="answer3" class="form-control input-lg {{ $errors->has('answer3') ? ' is-invalid' : '' }}" 
                          placeholder="Answer C" value="{{ $question->answer3 }}" /> 
                          @if($errors->has('answer3'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('answer3') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="answer4">Answer D</label>
                          <input type="text" name="answer4" class="form-control input-lg {{ $errors->has('answer4') ? ' is-invalid' : '' }}" 
                          placeholder="Answer D" value="{{ $question->answer4 }}" /> 
                          @if($errors->has('answer4'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('answer4') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="answer5">Answer E</label>
                          <input type="text" name="answer5" class="form-control input-lg {{ $errors->has('answer5') ? ' is-invalid' : '' }}" 
                          placeholder="Answer E" value="{{ $question->answer5 }}" /> 
                          @if($errors->has('answer5'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('answer5') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="correct">Correct Answer</label>
                          <select name="correct" class="form-control input-lg">
                            <option value="0">Select</option>
                            <option value="1" <?php if($question->correct == 1) echo 'selected' ?>>A</option>
                            <option value="2" <?php if($question->correct == 2) echo 'selected' ?>>B</option>
                            <option value="3" <?php if($question->correct == 3) echo 'selected' ?>>C</option>
                            <option value="4" <?php if($question->correct == 4) echo 'selected' ?>>D</option>
                            <option value="5" <?php if($question->correct == 5) echo 'selected' ?>>E</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="correct">Marks</label>
                          <input type="text" name="max_point" class="form-control" value="{{ $question->max_point }}" placeholder="Marks for question">
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