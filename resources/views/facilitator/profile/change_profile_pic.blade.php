@extends('facilitator.layouts.facilitatorlayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Change Profile Picture</h4>
        
      <ol class="breadcrumb">
            <li>
                <a href="{{ route('facilitator.home') }}">Dashboard</a>
            </li> 
            
            <li>
                <a href="{{ route('facilitator.profile.index') }}">Profile</a>
            </li> 

            <li class="active">
                Edit Profile 
            </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                  
                    <form action="{{ route('facilitator.profile.update_profile_pic') }}" method="post" enctype="multipart/form-data">
              
                        {{ csrf_field() }}
    
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
