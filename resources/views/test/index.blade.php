@extends('layouts.mainlayout')

@section('content')

<main>

@include('includes.nav')

<div id="page_wrapper" class="pt-50 pb-50">

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="page_title">
                    <h2>Assessment Tests</h2>
                </div>
            </div>

        </div>
        <hr>

        <div class="row">
            <div class="col-md-9">
                <h4>{{ $organization->org_name }} - {{ $training_program->program_name }}</h4><br>
                @if(isset($exams) && $exams->count() > 0)
                <div class="test_wrap">
                    @foreach ($exams as $exam)
                        <p class="test">
                            <a href="{{ route('test.intro', ['url' => $exam->exam_url]) }}">
                                {{ $exam->exam_title }} | Exam Type: {{ $exam->exam_type }} | Duration: {{ $exam->time_limit }} minutes
                            </a>
                        </p>
                    @endforeach
                </div>
                @else
                <p>There are no available assessment tests at this time</p>
                @endif
            </div>
        </div>
    </div>

</div>

</main>

@include('includes.footer')

@include('includes.jsincludes')

@stop