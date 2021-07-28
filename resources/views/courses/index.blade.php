@extends('layouts.mainlayout')

@section('content')

<main>

@include('includes.nav')

<div id="page_wrapper" class="pt-50 pb-50">

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="page_title">
                    <h2>Course Modules</h2>
                </div>
            </div>

        </div>
        
        <hr>

        <div class="row">
            <div class="col-md-12">
                <h4>{{ $organization->org_name }} - {{ $training_program->program_name }}</h4><br>
            </div>

            <div class="col-md-12">
                <div class="">
                    <h4>Course Description:</h4>
                    <div class="detail_bloc">
                        {!! $training_program->program_description !!}
                    </div>
                </div><br><br>
                <div class="responsive-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="60%">Module</th>
                                <th width="30%">Facilitator</th>
                                <th width="10%">Day</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->course_name }}</td>
                                <td><a href="{{ route('courses.facilitator', ['url'=>$course->url]) }}">{{ $course->name }}</a></td>
                                <td>
                                    Day {{ $course->day }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>

</main>

@include('includes.footer')

@include('includes.jsincludes')

@stop