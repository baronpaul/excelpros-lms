@extends('layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title"> Settings </h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="">Dashboard</a>
          </li>
          
          <li class="active">
            Settings 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>


  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          
          <div class="col-md-12">
              
              <div class="white-box">
                  <div class="row">
                    @if(Auth::guard()->user()->permission > 2)
                    <div class="col-md-3">
                      <div class="settings_itm">
                        <a href="{{ route('roles.index') }}">
                          <div class="settings_itm_icon"><i class="fa fa-drivers-license"></i></div>
                          <p>Roles</p>
                        </a>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="settings_itm">
                        <a href="{{ route('staff.index') }}">
                          <div class="settings_itm_icon"><i class="fa fa-user"></i></div>
                          <p>Users</p>
                        </a>
                      </div>
                    </div>


                    <div class="col-md-3">
                      <div class="settings_itm">
                        <a href="{{ route('kitchen_locations.index') }}">
                          <div class="settings_itm_icon"><i class="fa fa-building"></i></div>
                          <p>Kitchen Locations</p>
                        </a>
                      </div>
                    </div>
                    @endif

                    <div class="col-md-3">
                      <div class="settings_itm">
                        <a href="{{ route('vendors.index') }}">
                          <div class="settings_itm_icon"><i class="fa fa-group"></i></div>
                          <p>Vendors</p>
                        </a>
                      </div>
                    </div>

                  </div>
              </div>
              
          </div>
      </div>

    </div>  

  </div>

</div>

@endsection
