<!-- Start Sidebar Main-->
<div class="sidebar-main">
          
    <nav class="sidebar-nav">
      <ul class="metismenu" id="side-menu">
        
        <li>
          <a href="{{ route('organization.home') }}">
            <i class="ti-dashboard"></i>  
            <span class="menu-label">Dashboard </span>
          </a>
        </li>

        <li>
          <a href="{{ route('organization.courses.index') }}">
            <i class="fa fa-building"></i>  
            <span class="menu-label">Courses</span>
          </a>
        </li>

        <li>
            <a href="{{ route('organization.assessment.index') }}">
                <i class="fa fa-building"></i>  
                <span class="menu-label">Assessment</span>
            </a>
        </li>

        <li>
          <a href="{{ route('organization.participants.index') }}">
            <i class="fa fa-user"></i>  
            <span class="menu-label">Participants </span>
          </a>
        </li>
        
        <li>
          <a href="{{ route('organization.profile.change_password') }}">
            <i class="fa fa-lock"></i>   
            <span class="menu-label">Change Password </span>
          </a>
        </li>
      
        <li>
          <a href="#"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa fa-power-off"></i>  <span class="menu-label">Logout</span>
          </a>

          <form id="logout-form" action="{{ route('organization.logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </nav>

  </div>
  <!-- End Sidebar Main-->