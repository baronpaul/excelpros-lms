@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Delete Course</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.index') }}">Course</a>
          </li>
          
          <li class="active">
            Delete Course
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
                    You are about the remove a Course along with all its data. Please note that this action cannot be reversed once it is done, 
                    so proceed with caution.
                </div>
              <form action="{{ route('admin.training_programs.destroy') }}" method="post" enctype="multipart/form-data">
              
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
                      placeholder="Course Title" value="{{ $training_program->program_name }}" readonly /> 
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
                      <textarea name="program_description" class="form-control" rows="3" 
                      placeholder="Course Description" readonly>{{ $training_program->program_description }}
                      </textarea>
                    </div>
                  </div>

                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Delete Course </button>
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

