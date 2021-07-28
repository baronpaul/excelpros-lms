<div id="dark_skin">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="popup_wrap">
                    <div class="close_popup">
                        &times;
                    </div>

                    <div class="popup_header">
                        <h1>Let's Get Started</h1>
                        <h3>What type of user are you? Click to get started.</h3>
                    </div>

                    <div class="popup_ins">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('login') }}"><div class="pop_box">
                                    <div class="icon">
                                        <img src="{{ asset('images/student.png') }}" />
                                    </div>
                                    <p>Course Participant</p>
                                </div></a>
                            </div>

                            <div class="col-md-4">
                                <a href="{{ route('facilitator.login') }}"><div class="pop_box">
                                    <div class="icon">
                                        <img src="{{ asset('images/teacher.png') }}" />
                                    </div>
                                    <p>Course Facilitator</p>
                                </div></a>
                            </div>

                            <div class="col-md-4">
                                <a href="{{ route('organization.login') }}"><div class="pop_box">
                                    <div class="icon">
                                        <img src="{{ asset('images/leader.png') }}" />
                                    </div>
                                    <p>Company Representative</p>
                                </div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>