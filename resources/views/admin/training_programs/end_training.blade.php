@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Conclude Course</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.index') }}">Course</a>
          </li>
          
          <li class="active">
            Conclude Course
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

              <form action="{{ route('admin.training_programs.do_end_training') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}
                
                <input type="hidden" name="program_id" value="{{ $training_program->program_id }}">

                <div class="row">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="org_id">Organization Name</label>
                      <input type="text" name="org_name" class="form-control input-lg" 
                      placeholder="Organization Name" value="{{ $training_program->org_name }}" readonly />  
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="program_name">Course Title</label>
                      <input type="text" name="program_name" class="form-control input-lg" 
                      placeholder="Course Title" value="{{ $training_program->program_name }}" readonly /> 
                      
                    </div>
                  </div>


                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="start_date">Start Date</label>
                      <input type="date" name="start_date" class="form-control input-lg" value="{{ $training_program->start_date }}" readonly /> 
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="end_date">End Date</label>
                      <input type="date" name="end_date" class="form-control input-lg" value="{{ $training_program->end_date }}" readonly /> 
                    </div>
                  </div>

                  
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="duration">Duration (days)</label>
                      <input type="text" name="duration" class="form-control input-lg" 
                      placeholder="Course Duration" value="{{ $training_program->duration }}" readonly />
                    </div>
                  </div>

                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Conclude Course </button>
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

