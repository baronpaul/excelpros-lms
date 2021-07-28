@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Edit Course</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.index') }}">Course</a>
          </li>
          
          <li class="active">
            Edit Course
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

              <form action="{{ route('admin.training_programs.update') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}
                
                <input type="hidden" name="program_id" value="{{ $training_program->program_id }}">

                <div class="row">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="org_id">Organization Name</label>
                      <select name="org_id" class="form-control">
                        <option>Select organization</option> 
                        @foreach($organizations as $organization)   
                        <option value="{{ $organization->org_id }}" <?php if($training_program->org_id == $organization->org_id) echo 'selected' ?>>
                            {{ $organization->org_name }}
                        </option>
                        @endforeach
                      </select> 
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="program_name">Course Title</label>
                      <input type="text" name="program_name" class="form-control input-lg {{ $errors->has('program_name') ? ' is-invalid' : '' }}" 
                      placeholder="Course Title" value="{{ $training_program->program_name }}" required /> 
                      @if($errors->has('program_name'))
                        <span class="invalid-feedback red">
                          <strong>{{ $errors->first('program_name') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="email">Course Description</label>
                      <textarea name="program_description" id="summernote" class="form-control input-lg" rows="5" 
                      placeholder="Course Description">{{ $training_program->program_description }}
                      </textarea>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="duration">Course Duration (days)</label>
                      <select name="duration" class="form-control">
                        <?php
                        for( $i=1; $i<=10; $i++ ) {
                          ?>
                          <option value="{{ $i }}" <?php if($training_program->duration == $i) echo 'selected' ?>>{{ $i }}</option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="start_date">Start Date</label>
                      <input type="date" name="start_date" class="form-control input-lg" value="{{ $training_program->start_date }}" required /> 
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="end_date">End Date</label>
                      <input type="date" name="end_date" class="form-control input-lg" value="{{ $training_program->end_date }}" required /> 
                    </div>
                  </div>

                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Update Course </button>
                  <a href="{{ route('admin.training_programs.index') }}" class="btn btn-info btn-lg">Go Back</a>
                </div>

              </form>

            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

@endsection

