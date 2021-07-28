@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Edit Assignment</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.courses.detail', ['id' => $assignment->course_id]) }}">Courses</a>
          </li>
          
          <li class="active">
            Edit Assignment
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

              <form action="{{ route('admin.assignments.update') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="course_id" value="{{ $assignment->course_id }}" />

                <input type="hidden" name="assignment_id" value="{{ $assignment->assignment_id }}" />
                
                <div class="row">
                  
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="title">Assignment Title</label>
                      <input type="text" name="title" class="form-control input-lg {{ $errors->has('title') ? ' is-invalid' : '' }}" 
                      placeholder="Assignment Title" value="{{ $assignment->title }}" required /> 
                      @if($errors->has('title'))
                        <span class="invalid-feedback red">
                          <strong>{{ $errors->first('title') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="details">Assignment Details</label>
                      <textarea name="details" class="form-control" rows="5" id="summernote" 
                      placeholder="Assignment Details">{{ $assignment->details }}</textarea>
                    </div>
                  </div>
                  
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="submission_date">Submission Date</label>
                      <input type="date" name="submission_date" class="form-control input-lg" value="{{ $assignment->submission_date }}" /> 
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="attachments">Attachments</label>
                      <input type="file" name="attachments" class="form-control input-lg" /> 
                    </div>
                  </div>


                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-primary btn-lg"> Edit Assignment </button>
                  <a href="{{ route('admin.courses.detail', ['id' => $assignment->course_id]) }}" class="btn btn-info btn-lg">Go Back</a>
                </div>

              </form>

            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

@endsection

@include('admin.includes.js_includes')

</body>
</html>
