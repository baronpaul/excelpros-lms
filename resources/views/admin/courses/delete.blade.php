@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Delete Module</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.index') }}">Training Program</a>
          </li>
          
          <li class="active">
            Delete Module
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">
                <div class="alert alert-danger">
                    You are about the remove a course module along with all its data. Please note that this action cannot be reversed once it is done, 
                    so proceed with caution.
                </div>
              <form action="{{ route('admin.courses.destroy') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="course_id" value="{{ $course->course_id }}">
                
                <div class="row">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="facilitator_id">Facilitator</label>
                      <input type="text" name="" class="form-control input-lg" 
                      placeholder="Facilitator" value="{{ $course->name }}" readonly />  
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="course_name">Module</label>
                      <input type="text" name="course_name" class="form-control input-lg" 
                      placeholder="Course Name" value="{{ $course->course_name }}" readonly /> 
                     
                    </div>
                  </div>

                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Delete Module </button>
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

