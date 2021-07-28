@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Upload Multiple facilitators</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.facilitators.index') }}">Facilitators</a>
          </li>
          
          <li class="active">
            Upload facilitators
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

              <form action="{{ route('admin.facilitators.do_upload_facilitators') }}" method="post" enctype="multipart/form-data">
              
                {{ csrf_field() }}
                
                <div class="row">
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="uploaded_file">Upload File</label>
                        <input type="file" name="uploaded_file" class="form-control input-lg {{ $errors->has('uploaded_file') ? ' is-invalid' : '' }}" 
                        placeholder="Uploaded file" value="{{ old('uploaded_file') }}" required /> 
                        @if($errors->has('uploaded_file'))
                          <span class="invalid-feedback red">
                            <strong>{{ $errors->first('uploaded_file') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>

                </div>
                  
                
                <div class="">
                  <button type="submit" class="btn btn-info btn-lg"> Upload Facilitators </button>
                  <a href="{{ route('admin.facilitators.index') }}" class="btn btn-info btn-lg">Go Back</a>
                </div>

              </form>

            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

@endsection