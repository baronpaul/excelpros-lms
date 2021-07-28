@extends('layouts.mainlayout')

@section('content')

<main>

@include('includes.nav')

<div id="page_wrapper" class="pt-50 pb-50">

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="page_title">
                    <h2>Course Materials </h2>
                </div>
            </div>

        </div>

        <hr>

        <div class="row">
            
            <div class="col-md-8">
                <h4>{{ $organization->org_name }} - {{ $training_program->program_name }}</h4><br>

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

</main>

@include('includes.footer')

@include('includes.jsincludes')

@stop