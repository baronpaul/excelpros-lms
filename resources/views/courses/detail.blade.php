@extends('layouts.mainlayout')

@section('content')

<main>

@include('includes.nav')

<div id="page_wrapper" class="pt-50 pb-50">

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="page_title">
                    <h1>{{ $course->course_name }}</h1>
                </div>
            </div>

        </div>

        <hr>

        <div class="row">
            <div class="col-md-8">
                <h3>Course Details</h3>
                <div class="responsive-table">
                    
                    <div class="">
                        <h4>Description:</h4>
                        <div class="detail_bloc">
                            {!! $course->course_description !!}
                        </div>
                    </div>

                    <p>
                        <a href="{{ route('courses.facilitator') }}"><strong>Facilitator:</strong> {{ $course->name }}</a>
                    </p>

                </div>

            </div>

            <div class="col-md-4">
                <div class="well">
                    <h3>Course Materials</h3>

                    @foreach($course_materials as $course_material)
                    <a href="{{ url('/') }}/{{ $course_material->file }}" target="_blank" title="View File">
                        <div class="course_mat_itm">
                        
                            {{ $course_material->title }}
                            <i class="la la-download"></i>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

</main>

@include('includes.footer')

@include('includes.jsincludes')

@stop