@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  
  <div class="page-title-box">
      <h4 class="page-title">Suspend Account</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="">Dashboard</a>
          </li>
          <li>
            <a href="">Profile </a>
          </li>
          <li class="active">
            Suspend Account 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>


  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          
          <div class="col-md-12">
              
              <div class="white-box">
                  
                <form action="{{ route('admin.users.do_suspend') }}" method="post" enctype="multipart/form-data">
              
                    {{ csrf_field() }}

                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="firstname">First Name</label>
                          <input type="text" name="firstname" class="form-control input-lg" 
                          placeholder="First Name" value="{{ $user->firstname }}" readonly /> 
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="lastname">Last Name</label>
                          <input type="text" name="lastname" class="form-control input-lg" 
                          placeholder="Last Name" value="{{ $user->lastname }}" readonly /> 
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" name="email" class="form-control input-lg" 
                          placeholder="Email" value="{{ $user->email }}" readonly /> 
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="text" name="phone" class="form-control input-lg" 
                          placeholder="Phone" value="{{ $user->phone }}" readonly /> 
                        </div>
                      </div>
                    </div>
                    
                    <div class="btn_wrap">
                      <button type="submit" class="btn btn-info btn-lg"> Suspend Account </button>
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