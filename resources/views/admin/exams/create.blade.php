<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Create Exam</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          <li>
            <a href="{{ route('admin.exams.index') }}">Exams </a>
          </li>
          <li class="active">
            Create Exam 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          
          <div class="col-md-12">
              
              <div class="white-box">
                  <form action="{{ route('admin.exams.store') }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}

                    <input type="hidden" name="program_id" value="{{ $training_program->program_id }}"/>
                    
                    <div class="row">
                      
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="program_name">Training Program</label>
                          <input type="text" name="program_name" class="form-control input-lg" 
                          placeholder="Exam Title" value="{{ $training_program->program_name }}" readonly /> 
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="exam_title">Exam Title</label>
                          <input type="text" name="exam_title" class="form-control input-lg {{ $errors->has('exam_title') ? ' is-invalid' : '' }}" 
                          placeholder="Exam Title" value="{{ old('exam_title') }}" required /> 
                          @if($errors->has('exam_title'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('exam_title') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="collection_id">Collection</label>
                          <select name="collection_id" class="form-control input-lg" required>
                            <option >Select</option>
                            @foreach($collections as $collection)
                            <option value="{{ $collection->collection_id }}">{{ $collection->collection_title }}</option>
                            @endforeach
                          </select>
                        </div>
                        @if($errors->has('collection_id'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('collection_id') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exam_type">Exam Type</label>
                          <select name="exam_type" class="form-control input-lg" required>
                            <option >Select</option>
                            <option value="essay">essay</option>
                            <option value="multiple choice">multiple choice</option>
                          </select>
                        </div>
                        @if($errors->has('exam_type'))
                            <span class="invalid-feedback red">
                              <strong>{{ $errors->first('exam_type') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="no_of_questions">Number of Questions</label>
                          <select name="no_of_questions" class="form-control input-lg" required>
                            <option >Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="35">35</option>
                            <option value="40">40</option>
                            <option value="45">45</option>
                            <option value="50">50</option>
                            <option value="60">60</option>
                            <option value="70">70</option>
                            <option value="80">80</option>
                            <option value="90">90</option>
                            <option value="100">100</option>
                          </select>
                        </div>
                        @if ($errors->has('no_of_questions'))
                            <span class="help-block">
                                <strong>{{ $errors->first('no_of_questions') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="time_limit">Time limit (minutes)</label>
                          <select name="time_limit" class="form-control input-lg" required>
                            <option >Select</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="35">35</option>
                            <option value="40">40</option>
                            <option value="45">45</option>
                            <option value="50">50</option>
                            <option value="60">60</option>
                            <option value="70">70</option>
                            <option value="80">80</option>
                            <option value="90">90</option>
                            <option value="100">100</option>
                            <option value="110">110</option>
                            <option value="120">120</option>
                            <option value="130">130</option>
                            <option value="140">140</option>
                            <option value="150">150</option>
                          </select>
                        </div>
                        @if ($errors->has('time_limit'))
                            <span class="help-block">
                                <strong>{{ $errors->first('time_limit') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="show_score">Show score to participant</label>
                          <select name="show_score" class="form-control input-lg">
                            <option >Select</option>
                            <option value="yes">yes</option>
                            <option value="no">no</option>
                          </select>
                        </div>
                        @if ($errors->has('show_score'))
                            <span class="help-block">
                                <strong>{{ $errors->first('show_score') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="instruction">Instructions</label>
                          <textarea name="instructions" id="instructions" class="form-control" rows="4" placeholder="Instructions"></textarea> 
                        </div>
                      </div>
                      
                    </div>
                    
                    <div class="btn_wrap">
                      <button type="submit" class="btn btn-info btn-lg"> Create </button>
                    </div>

                  </form>
              </div>

          </div>
      </div>

    </div>  

  </div>
</div>

@endsection