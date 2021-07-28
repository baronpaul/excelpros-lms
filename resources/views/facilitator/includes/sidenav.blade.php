<!-- Start Sidebar Main-->
<div class="sidebar-main">
          
    <nav class="sidebar-nav">
      <ul class="metismenu" id="side-menu">
        
        <li>
          <a href="{{ route('facilitator.home') }}">
            <i class="ti-dashboard"></i>  
            <span class="menu-label">Dashboard </span>
          </a>
        </li>

        <li>
          <a href="{{ route('facilitator.courses.index') }}">
            <i class="fa fa-building"></i>  
            <span class="menu-label">Courses</span>
          </a>
        </li>

        <li>
            <a href="{{ route('facilitator.assessment.index') }}">
                <i class="fa fa-building"></i>  
                <span class="menu-label">Assessment</span>
            </a>
        </li>

        <li>
          <a href="{{ route('facilitator.evaluations.index') }}">
            <i class="fa fa-user"></i>  
            <span class="menu-label">Evaluations </span>
          </a>
        </li>
        
        <li>
          <a href="{{ route('facilitator.profile.change_password') }}">
            <i class="fa fa-lock"></i>   
            <span class="menu-label">Change Password </span>
          </a>
        </li>
      
        <li>
          <a href="#"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa fa-power-off"></i>  <span class="menu-label">Logout</span>
          </a>

          <form id="logout-form" action="{{ route('facilitator.logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </nav>

  </div>
  <!-- End Sidebar Main-->