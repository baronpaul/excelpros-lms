@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Add Course Materials</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.detail', ['id' => $training_program->program_id]) }}">Training</a>
          </li>
          
          <li class="active">
            Add Course Materials
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
              <form action="{{ route('admin.training_programs.store_course_material') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="program_id" value="{{ $training_program->program_id }}" />
                
                <div class="row">
                  
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control input-lg {{ $errors->has('title') ? ' is-invalid' : '' }}" 
                      placeholder="Title" value="{{ old('title') }}" required /> 
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
                      <input type="file" name="file" class="form-control input-lg" value="{{ old('file') }}" required /> 
                      @if($errors->has('file'))
                        <span class="invalid-feedback red">
                          <strong>{{ $errors->first('file') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>


                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Add Course Material </button>
                  <a href="{{ route('admin.training_programs.detail', ['id' => $training_program->program_id]) }}" class="btn btn-info btn-lg">Go Back</a>
                </div>

              </form>

            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

@endsection
