<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<meta name="author" content="Paul Anyiam">
	
	<meta name="description" content="description here">
	
	<meta name="keywords" content="keywords,here">

	<title>Informed LMS</title>
	
  <link rel="shortcut icon" href="">
  
  <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;400;500;600;800;900&display=swap" rel="stylesheet">

  <link href="{{ asset('css/adminstyles.css') }}" rel="stylesheet">

	<link href="{{ asset('admin_assets/css/metisMenu.min.css') }}" rel="stylesheet" />
    
  <link href="{{ asset('admin_assets/css/nanoscroller.css') }}" rel="stylesheet" />
    
  <link href="{{ asset('admin_assets/css/icons.css') }}" rel="stylesheet">

  <link href="{{ asset('admin_assets/css/line-awesome-font-awesome.css') }}" rel="stylesheet">

  <link href="{{ asset('admin_assets/css/line-awesome.css') }}" rel="stylesheet">

  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    
  <link href="{{ asset('admin_assets/css/toastr.min.css') }}" rel="stylesheet" />

  <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet" />
    
  <link href="{{ asset('admin_assets/css/additional.css') }}" rel="stylesheet" />
    
  <link href="{{ asset('admin_assets/css/responsive.css') }}" rel="stylesheet" />

  <link href="{{ asset('admin_assets/css/summernote.css') }}" rel="stylesheet">

</head>

<body class="fixed-top">
 
<div id="wrapper">
    
    <div class="page-header navbar navbar-fixed-top">
      <div class="page-header-main">

        <div class="logo">
          <a href="{{ route('home') }}">
            <h3 style="color: #fff; margin-top:15px;">Informed LMS </h3>
          </a>
        </div> <!--/.logo-->


        <div class="sidebar-main-toggle">
            <a href="javascript:;" class="navbar-small pull-left ">
              <i class="fa fa-bars"></i>
            </a>
        </div> <!--/.menu-toggler-->


        <!--Start Right Menu-->
        <div class="right-menu">
            <ul class="nav navbar-nav navbar-right">

              <li class="dropdown dropdown-usermenu">
                <a href="" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  
                  <span class="hidden-sm hidden-xs"><i class="fa fa-user-o"></i> {{ Auth::guard('facilitator')->user()->name }}</span>
                  <span class="caret hidden-sm hidden-xs"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                  
                  <li>
                    <a href="{{ route('facilitator.profile.change_password') }}" >
                      <i class="fa fa-lock"></i>  Change Password
                    </a>
                  </li>

                  <li>
                    <a href="{{ route('facilitator.logout') }}" onclick="event.preventDefault(); document.getElementById('logout_form_top').submit();">
                      <i class="fa fa-power-off"></i>  Logout
                    </a>

                    <form id="logout_form_top" action="{{ route('facilitator.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </li>
                  
                </ul>
              </li> 
                     
            </ul>
        </div>
        <!--End Right Menu-->

      </div>
    </div>
    <!--End page-header-->


    <div class="clearfix"> </div>


    <div class="main-container">
        
        @include('facilitator.includes.sidenav')


		    <!--Start wrapperr-->
    		<div class="wrapper">
    			<div class="content-main container">

    				@yield('content')
    			
    			</div> <!--End content-main-->

    			<footer class="footer-main">
            <?php echo date('Y') ?> &copy; Informed LMS, Powered by <a href="http://averti.com.ng" target="_blank">Averti PM</a>
         </footer>	
    			  
    		</div>

	  </div> <!--/.Main page-container-->

</div>
<!--End wrapper-->


@include('admin.includes.js_includes')

</body>
</html>


