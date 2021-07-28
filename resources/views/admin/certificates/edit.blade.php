@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Edit Certificate</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.index') }}">Training Program</a>
          </li>
          
          <li class="active">
            Edit Certificate
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

              <form action="{{ route('admin.certificates.update') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="certificate_id" value="{{ $certificate->certificate_id }}">

                <div class="row">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="program_id">Select Training Program</label>
                      <select name="program_id" class="form-control" required> 
                        @foreach($training_programs as $training_program)   
                        <option value="{{ $training_program->program_id }}" 
                          <?php if($certificate->program_id == $training_program->program_id) echo 'selected' ?>>
                          {{ $training_program->program_name }}
                        </option>
                        @endforeach
                      </select> 
                      @if($errors->has('program_id'))
                        <span class="invalid-feedback red">
                          <strong>{{ $errors->first('program_id') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="style">Certificate Style</label>
                      <select name="style" class="form-control" required> 
                        <option value="standard" <?php if($certificate->style == 'standard') echo 'selected' ?>>
                          Standard Certificate</option>
                        
                        <option value="custom-left" <?php if($certificate->style == 'standard') echo 'custom-left' ?>>Custom Logo Left</option>
                        <option value="custom-right" <?php if($certificate->style == 'standard') echo 'custom-right' ?>>Custom Logo Right</option>
                      </select> 
                      @if($errors->has('style'))
                        <span class="invalid-feedback red">
                          <strong>{{ $errors->first('style') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-primary btn-lg"> Update Certificate </button>
                  <a href="{{ route('admin.certificates.index') }}" class="btn btn-info btn-lg">Go Back</a>
                </div>

              </form>

            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

@endsection
