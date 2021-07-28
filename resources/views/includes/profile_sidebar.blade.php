
<div class="sidebar">
    <ul>
        <li>
            <a href="{{ route('profile.index') }}">
                <i class="lnr lnr-user"></i>
                Profile
            </a>
        </li>

        <li>
            <a href="{{ route('profile.change_password') }}">
                <i class="lnr lnr-license"></i>
                Change Password
            </a>
            
        </li>

        <li>
            
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="lnr lnr-power-switch"></i>
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div>