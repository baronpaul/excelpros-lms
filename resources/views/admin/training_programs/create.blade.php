@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Add Course</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.index') }}">Courses</a>
          </li>
          
          <li class="active">
            Add Course
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

              <form action="{{ route('admin.training_programs.store') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}
                
                <div class="row">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="org_id">Organization Name</label>
                      <select name="org_id" class="form-control">
                        <option>Select organization</option> 
                        @foreach($organizations as $organization)   
                        <option value="{{ $organization->org_id }}">{{ $organization->org_name }}</option>
                        @endforeach
                      </select> 
                      @if($errors->has('org_name'))
                        <span class="invalid-feedback red">
                          <strong>{{ $errors->first('org_name') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="program_name">Course Title</label>
                      <input type="text" name="program_name" class="form-control input-lg {{ $errors->has('program_name') ? ' is-invalid' : '' }}" 
                      placeholder="Course Title" value="{{ old('program_name') }}" required /> 
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
                      <textarea name="program_description" id="summernote" class="form-control input-lg" rows="5" placeholder="Program Description"></textarea>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="duration">Course Duration (days)</label>
                      <select name="duration" class="form-control">
                        <?php
                        for( $i=1; $i<=10; $i++ ) {
                          ?>
                          <option value="{{ $i }}">{{ $i }}</option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="start_date">Start Date</label>
                      <input type="date" name="start_date" class="form-control input-lg" value="{{ old('start_date') }}" required /> 
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="end_date">End Date</label>
                      <input type="date" name="end_date" class="form-control input-lg" value="{{ old('end_date') }}" required /> 
                    </div>
                  </div>

                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Create Course </button>
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
