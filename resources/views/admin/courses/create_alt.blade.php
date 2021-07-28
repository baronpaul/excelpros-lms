@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Add Module</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.index') }}">Training Program</a>
          </li>
          
          <li class="active">
            Add Module
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
              <form action="{{ route('admin.courses.store') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="program_id" value="{{ $training_program->program_id }}">
                <div id="faculty_wrapper">
                  <div class="row">
                    <div class="col-md-5">
                      <label for="facilitator_id">Select Facilitator</label>
                    </div>
                    <div class="col-md-5">
                      <label for="course_name">Course Name</label>
                    </div>
                    <div class="col-md-2">
                      <label for="day">Day</label>
                    </div>
                  </div>
                <div class="clonedinput">
                  <div class="row">
                    
                    <div class="col-md-5">
                      <div class="form-group">
                        
                        @if(isset($facilitators) && $facilitators != null)
                        <select name="facilitator_id[]" class="form-control" required> 
                          @foreach($facilitators as $facilitator)   
                          <option value="{{ $facilitator->id }}">{{ $facilitator->name }}</option>
                          @endforeach
                        </select> 
                        @else 
                        <p>There are no facilitators on the platform. <a href="">Please create a facilitator profile</a></p>
                        @endif
                        @if($errors->has('program_id'))
                          <span class="invalid-feedback red">
                            <strong>{{ $errors->first('program_id') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>

                    <div class="col-md-5">
                      <div class="form-group">
                        
                        <input type="text" name="course_name[]" class="form-control input-lg" 
                        placeholder="Course Name" required /> 
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        
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
                </div>
                </div>

                
                <div class="">
                  
                  <button type="submit" class="btn btn-primary btn-lg"> Create Course </button>
                  <a href="{{ route('admin.training_programs.detail', ['id' => $training_program->program_id]) }}" 
                    class="btn btn-info btn-lg">Go Back</a>

                    <a href="#" id="add_more" class="btn btn-primary btn-lg pull-right">Add Field</a>
                    <a href="#" id="remove" class="btn btn-danger btn-lg pull-right">Remove</a>
                </div>

              </form>

            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

@endsection
