<div class="navigation">
    <div class="brand_wrap">
        <div class="page_brand">
            <a href="{{ route('home') }}">ExcelProsLMS</a>
        </div>
        
        <div class="nav_trigger">
            <i class="fa fa-bars"></i>
        </div>
    </div>

    <div class="nav">
        <ul>
            @if (!Auth::guest())
            <li>
                <a href="{{ route('profile.index') }}">Welcome, {{ Auth::user()->firstname }}</a>
            </li>

            <li>
                <a href="{{ route('courses.index') }}">Course Modules</a>
            </li>

            <li>
                <a href="{{ route('courses.materials') }}">Course Materials</a>
            </li>

            <li>
                <a href="{{ route('test.index') }}">Assessment</a>
            </li>

            <li>
                <a href="{{ route('evaluations.facilitators') }}">Facilitator Evaluation</a>
            </li>

            <li>
                <a href="{{ route('evaluations.program') }}">Course Evaluation</a>
            </li>


            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>

            @else

            <li>
                <a href="{{ route('login') }}">Login</a>
            </li>

            @endif
        </ul>
    </div>
</div>