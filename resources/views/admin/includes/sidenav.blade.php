<!-- Start Sidebar Main-->
<div class="sidebar-main">
          
    <nav class="sidebar-nav">
      <ul class="metismenu" id="side-menu">
        
        <li>
          <a href="{{ route('admin.home') }}">
            <i class="fa fa-dashboard"></i>  
            <span class="menu-label">Dashboard </span>
          </a>
        </li>

        <li>
          <a href="{{ route('admin.organizations.index') }}">
            <i class="fa fa-building"></i>  
            <span class="menu-label">Organizations </span>
          </a>
        </li>

        <li>
          <a href="{{ route('admin.training_programs.index') }}">
            <i class="fa fa-building"></i>  
            <span class="menu-label">Courses</span>
          </a>
        </li>

        <li>
          <a href="javascript:void(0)">
            <i class="fa fa-building"></i>  
            <span class="menu-label">Assessment</span>
            <span class="fa arrow"></span>
          </a>
          <ul class="nav nav-sub nav-second-level collapse">
            <li>
              <a href="{{ route('admin.collections.index') }}">Question Collections</a>
            </li>
            <li>
              <a href="{{ route('admin.questions.index') }}">Questions</a>
            </li>
            <li>
              <a href="{{ route('admin.exams.index') }}">Tests</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="{{ route('admin.evaluations.index') }}">
            <i class="fa fa-user"></i>  
            <span class="menu-label">Evaluations </span>
          </a>
        </li>

        
        <li>
          <a href="{{ route('admin.certificates.index') }}">
            <i class="fa fa-certificate"></i>  
            <span class="menu-label">Certificate Templates </span>
          </a>
        </li>

        
        <li>
          <a href="{{ route('admin.facilitators.index') }}">
            <i class="fa fa-user"></i>  
            <span class="menu-label">Facilitators </span>
          </a>
        </li>

        
        @if(Auth::guard('admin')->user()->permission >= 2)
        
        <li>
          <a href="{{ route('admin.users.index') }}">
            <i class="fa fa-users"></i>  
            <span class="menu-label">Users </span>
          </a>
        </li>
        
        @endif

        
        @if(Auth::guard('admin')->user()->permission == 3)
        <li>
          <a href="{{ route('admin.portal_admins.index') }}">
            <i class="fa fa-users"></i>   
            <span class="menu-label">Portal Admin </span>
          </a>
        </li>
        @endif

        
        <li>
          <a href="{{ route('admin.profile.change_password') }}">
            <i class="fa fa-lock"></i>   
            <span class="menu-label">Change Password </span>
          </a>
        </li>
      
        <li>
          <a href="#"
              onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">
              <i class="fa fa-power-off"></i>  <span class="menu-label">Logout</span>
          </a>

          <form id="logout-form2" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </nav>

  </div>
  <!-- End Sidebar Main-->