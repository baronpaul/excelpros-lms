@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Update Course Material</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.detail', ['id' => $course_material->program_id]) }}">Course</a>
          </li>
          
          <li class="active">
            Update Course Material
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

              <form action="{{ route('admin.training_programs.update_course_material') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="course_material_id" value="{{ $course_material->id }}" />

                <input type="hidden" name="program_id" value="{{ $course_material->program_id }}" />
                
                <div class="row">
                  
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control input-lg {{ $errors->has('title') ? ' is-invalid' : '' }}" 
                      placeholder="Title" value="{{ $course_material->title }}" required /> 
                      @if($errors->has('title'))
                        <span class="invalid-feedback red">
                          <strong>{{ $errors->first('title') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="file">File</label>
                      <input type="file" name="file" class="form-control input-lg" /> 
                    </div>
                  </div>


                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Update Course Material </button>
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

