<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Edit Exam</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          <li>
            <a href="{{ route('admin.exams.index') }}">Exams </a>
          </li>
          <li class="active">
            Edit Exam 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          
          <div class="col-md-12">
              
              <div class="white-box">
                  <form action="{{ route('admin.exams.update') }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}

                    <input type="hidden" name="exam_id" value="{{ $exam->exam_id }}">

                    <input type="hidden" name="program_id" value="{{ $exam->program_id }}">

                    <div class="row">
                      
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exam_title">Exam Title</label>
                          <input type="text" name="exam_title" class="form-control input-lg {{ $errors->has('exam_title') ? ' is-invalid' : '' }}" 
                          placeholder="Exam Title" value="{{ $exam->exam_title }}" required /> 
                          @if($errors->has('exam_title'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('exam_title') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exam_type">Exam Type</label>
                          <select name="exam_type" class="form-control input-lg">
                            <option value="{{ $exam->exam_type }}">{{ $exam->exam_type }}</option>
                            <option value="essay">essay</option>
                            <option value="multiple choice">multiple choice</option>
                          </select>
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
                          <label for="no_of_questions">Number of Questions</label>
                          <select name="no_of_questions" class="form-control input-lg">
                            <option value="{{ $exam->number_of_questions }}">{{ $exam->number_of_questions }}</option>
                            <option value="10" <?php if($exam->number_of_questions == '10') echo 'selected' ?>>10</option>
                            <option value="20" <?php if($exam->number_of_questions == '20') echo 'selected' ?>>20</option>
                            <option value="30" <?php if($exam->number_of_questions == '30') echo 'selected' ?>>30</option>
                            <option value="40" <?php if($exam->number_of_questions == '40') echo 'selected' ?>>40</option>
                            <option value="50" <?php if($exam->number_of_questions == '50') echo 'selected' ?>>50</option>
                            <option value="60" <?php if($exam->number_of_questions == '60') echo 'selected' ?>>60</option>
                            <option value="70" <?php if($exam->number_of_questions == '70') echo 'selected' ?>>70</option>
                            <option value="80" <?php if($exam->number_of_questions == '80') echo 'selected' ?>>80</option>
                            <option value="90" <?php if($exam->number_of_questions == '90') echo 'selected' ?>>90</option>
                            <option value="100" <?php if($exam->number_of_questions == '100') echo 'selected' ?>>100</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="time_limit">Time limit (minutes)</label>
                          <select name="time_limit" class="form-control input-lg">
                            <option >Select</option>
                            <option value="5" <?php if($exam->time_limit == '5') echo 'selected' ?>>5</option>
                            <option value="10" <?php if($exam->time_limit == '10') echo 'selected' ?>>10</option>
                            <option value="15" <?php if($exam->time_limit == '15') echo 'selected' ?>>15</option>
                            <option value="20" <?php if($exam->time_limit == '20') echo 'selected' ?>>20</option>
                            <option value="25" <?php if($exam->time_limit == '25') echo 'selected' ?>>25</option>
                            <option value="30" <?php if($exam->time_limit == '30') echo 'selected' ?>>30</option>
                            <option value="35" <?php if($exam->time_limit == '35') echo 'selected' ?>>35</option>
                            <option value="40" <?php if($exam->time_limit == '40') echo 'selected' ?>>40</option>
                            <option value="45" <?php if($exam->time_limit == '45') echo 'selected' ?>>45</option>
                            <option value="50" <?php if($exam->time_limit == '50') echo 'selected' ?>>50</option>
                            <option value="60" <?php if($exam->time_limit == '60') echo 'selected' ?>>60</option>
                            <option value="70" <?php if($exam->time_limit == '70') echo 'selected' ?>>70</option>
                            <option value="80" <?php if($exam->time_limit == '80') echo 'selected' ?>>80</option>
                            <option value="90" <?php if($exam->time_limit == '90') echo 'selected' ?>>90</option>
                            <option value="100" <?php if($exam->time_limit == '100') echo 'selected' ?>>100</option>
                            <option value="110" <?php if($exam->time_limit == '110') echo 'selected' ?>>110</option>
                            <option value="120" <?php if($exam->time_limit == '120') echo 'selected' ?>>120</option>
                            <option value="130" <?php if($exam->time_limit == '130') echo 'selected' ?>>130</option>
                            <option value="140" <?php if($exam->time_limit == '140') echo 'selected' ?>>140</option>
                            <option value="150" <?php if($exam->time_limit == '150') echo 'selected' ?>>150</option>
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

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="show_score">Show score to participant</label>
                          <select name="show_score" class="form-control input-lg">
                            <option >Select</option>
                            <option value="yes" <?php if($exam->show_score == 'yes') echo 'selected' ?>>yes</option>
                            <option value="no" <?php if($exam->show_score == 'no') echo 'selected' ?>>no</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="instruction">Instructions</label>
                          <textarea name="instructions" id="instructions" class="form-control" rows="4" placeholder="Instructions" required></textarea> 
                          @if($errors->has('instructions'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('instructions') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>
                      
                    </div>

                    <div class="btn_wrap">
                      <button type="submit" class="btn btn-info btn-lg"> Update Exam </button>

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