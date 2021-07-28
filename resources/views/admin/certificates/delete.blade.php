@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Delete Certificate</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.index') }}">Training Program</a>
          </li>
          
          <li class="active">
            Delete Certificate
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

              <form action="{{ route('admin.certificates.destroy') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}

                <input type="hidden" name="certificate_id" value="{{ $certificate->certificate_id }}">

                <div class="row">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="program_id">Training Program</label>
                      <input type="text" class="form-control" value="{{ $certificate->program_name }}" readonly>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="program_id">Certificate</label>
                      <input type="text" class="form-control" value="{{ $certificate->style }}">
                    </div>
                  </div>

                </div>
                
                <div class="">
                  <button type="submit" class="btn btn-primary btn-lg"> Delete Certificate </button>
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