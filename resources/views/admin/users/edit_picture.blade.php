@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Update Profile Picture</h4>
        
      <ol class="breadcrumb">
          <li class="active">
            <a href="">Dashboard </a>
          </li>

          <li>
            <a href="">Users </a>
          </li>

          <li>
            <a href="">Update Profile Pictures </a>
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>


  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          <div class="col-md-12">
              <div class="white-box">
                  
                  <form action="{{ route('admin.users.update_picture') }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}

                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="picture">Profile Picture</label>
                          <input type="file" name="picture" class="form-control input-lg" required /> 
                          
                        </div>
                      </div>

                    </div>
                    
                    <div class="btn_wrap">
                      <button type="submit" class="btn btn-info btn-lg"> Update Profile Pix </button>
                      <a href="{{ URL::previous() }}" class="btn btn-info btn-lg">Go Back</a>
                    </div>

                  </form>

              </div>
          </div>

      </div>

    </div>  

  </div>
</div>

@endsection