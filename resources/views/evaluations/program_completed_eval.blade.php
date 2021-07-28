@extends('layouts.mainlayout')

@section('content')

<main>

@include('includes.nav')

<div id="page_wrapper" class="pt-50 pb-50">

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="page_title">
                    <h2>Course Evaluation</h2>
                </div>
            </div>

        </div>
        <hr>

        <div class="row">
            <div class="col-md-10">
                <h4>{{ $organization->org_name }} - {{ $training_program->program_name }}</h4><br>

                <p>
                    You have already completed the Course Evaluation. 
                </p>
                <div>
                    <a href="{{ route('evaluations.index') }}" class="btn btn-info">Back to Evaluations Index</a>
                </div>
            </div>
        </div>
    </div>

</div>

</main>

@include('includes.footer')

@include('includes.jsincludes')

@stop