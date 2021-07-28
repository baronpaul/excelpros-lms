@include('includes.nav')

<div id="page_wrapper" class="pt-50 pb-50">

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="page_title">
                    <h2>Dashboard</h2>
                </div>
            </div>

        </div>
        <hr>
        
        <div class="row">
            <div class="col-md-12">
                <h4>{{ $organization->org_name }} - {{ $training_program->program_name }}</h4><br>
            </div>

            <div class="col-md-12" style="padding-top: 50px">
                
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="dash-box">
                            <a href="{{ route('courses.index') }}">
                                <div class="dash-icon">
                                    <img src="{{ asset('images/courses.png') }}" />
                                </div>
                                <div class="dash-text">Course Modules</div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="dash-box">
                            <a href="{{ route('courses.materials') }}">
                                <div class="dash-icon">
                                    <img src="{{ asset('images/course-materials.png') }}" />
                                </div>
                                <div class="dash-text">Course Materials</div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="dash-box">
                            <a href="{{ route('test.index') }}">
                                <div class="dash-icon">
                                    <img src="{{ asset('images/exam.png') }}" />
                                </div>
                                <div class="dash-text">Assessment</div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="dash-box">
                            <a href="{{ route('evaluations.facilitators') }}">
                                <div class="dash-icon">
                                    <img src="{{ asset('images/fac_evaluation.png') }}" />
                                </div>
                                <div class="dash-text">Facilitator Evaluation</div>
                            </a>
                        </div>
                    </div>

                    @if($training_program->program_status == 'completed')
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="dash-box">
                                <a href="{{ route('evaluations.program') }}">
                                    <div class="dash-icon">
                                        <img src="{{ asset('images/evaluation.png') }}" />
                                    </div>
                                    <div class="dash-text">Course Evaluation</div>
                                </a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>

</div>