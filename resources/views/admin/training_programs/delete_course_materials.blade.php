@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Delete Course Materials</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.detail', ['id' => $course_material->program_id]) }}">Training</a>
          </li>
          
          <li class="active">
            Delete Course Materials
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
                You are about this course material. Please note that this action cannot be reversed once it is done, 
                so proceed with caution.
              </div>

              <form action="{{ route('admin.training_programs.remove_course_material') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="course_material_id" value="{{ $course_material->id }}" />

                <input type="hidden" name="program_id" value="{{ $course_material->program_id }}" />
                
                <div class="row">
                  
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control input-lg {{ $errors->has('title') ? ' is-invalid' : '' }}" 
                      placeholder="Title" value="{{ $course_material->title }}" readonly /> 
                      @if($errors->has('title'))
                        <span class="invalid-feedback red">
                          <strong>{{ $errors->first('title') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Delete Course Material </button>
                  <a href="{{ route('admin.training_programs.detail', ['id' => $course_material->program_id]) }}" class="btn btn-info btn-lg">Go Back</a>
                </div>

              </form>

            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

@endsection
