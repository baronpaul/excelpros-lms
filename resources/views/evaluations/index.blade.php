@extends('layouts.mainlayout')

@section('content')

<main>

@include('includes.nav')

<div id="page_wrapper" class="pt-50 pb-50">

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="page_title">
                    <h2>Evaluations</h2>
                </div>
            </div>

        </div>
        <hr>

        <div class="row">
            <div class="col-md-8">
                <h4>{{ $organization->org_name }} - {{ $training_program->program_name }}</h4><br>

                <div class="test_wrap">
                <p class="test"><a href="{{ route('evaluations.facilitators') }}">Facilitator Evaluations</a></p>
                <p class="test"><a href="{{ route('evaluations.program') }}">Course Evaluation</a></p>
                </div>
            </div>
        </div>
    </div>

</div>

</main>

@include('includes.footer')

@include('includes.jsincludes')

@stop