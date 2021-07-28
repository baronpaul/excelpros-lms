@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Edit Module</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.index') }}">Training Program</a>
          </li>
          
          <li class="active">
            Edit Module
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">
              <h3>{{ $training_program->program_name }}</h3>
              <hr>
              <form action="{{ route('admin.courses.update') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="program_id" value="{{ $course->program_id }}">

                <input type="hidden" name="course_id" value="{{ $course->course_id }}">
                
                <div class="row">
                  
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="facilitator_id">Select Facilitator</label>
                      
                      <select name="facilitator_id" class="form-control" required> 
                        @foreach($facilitators as $facilitator)   
                        <option value="{{ $facilitator->id }}" <?php if($course->facilitator_id == $facilitator->id) echo 'selected' ?>>
                            {{ $facilitator->name }}</option>
                        @endforeach
                      </select> 
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="course_name">Course Name</label>
                      <input type="text" name="course_name" class="form-control input-lg {{ $errors->has('course_name') ? ' is-invalid' : '' }}" 
                      placeholder="Course Name" value="{{ $course->course_name }}" required /> 
                      @if($errors->has('course_name'))
                        <span class="invalid-feedback red">
                          <strong>{{ $errors->first('course_name') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="day">Day</label>
                      <select name="day" class="form-control">
                        <?php
                        $duration = $training_program->duration;
                        for( $i=1; $i<=$duration; $i++ ) {
                          ?>
                          <option value="{{ $i }}">{{ $i }}</option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Update Module </button>
                  <a href="{{ route('admin.training_programs.detail', ['id' => $course->program_id]) }}" class="btn btn-info btn-lg">Go Back</a>
                </div>

              </form>

            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

@endsection

