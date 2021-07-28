<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.mainlayout')

@section('content')

<main>

@include('includes.nav')

<div id="page_wrapper" class="pt-50 pb-50">

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="page_title">
                    <h2>Facilitator Evaluation</h2>
                </div>
            </div>

        </div>
        <hr>

        <div class="row">
            <div class="col-md-12">
                <h4>{{ $organization->org_name }} - {{ $training_program->program_name }}</h4><br>
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th width="25%">Facilitator</th>
                            
                            <th width="45%">Module Handled</th>

                            <th width="15%">Day</th>
                            
                            <th width="20%" class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($facilitators as $facilitator)
                        <tr>
                            <td>{{ $facilitator->name }}</td>
                            <td>{{ $facilitator->course_name }}</td>
                            <td>{{ $facilitator->day }}</td>
                            <td class="text-right">
                                <?php
                                $facilitator_id = $facilitator->id;
                                $course_id = $facilitator->course_id;
                                $evaluation = DB::table('facilitator_evaluations')->where('user_id','=', $user_id)
                                ->where('facilitator_id', '=', $facilitator_id)
                                ->where('program_id', '=', $training_program->program_id)
                                ->where('course_id', '=', $course_id)
                                ->first();
                                
                                ?>
                                @if($evaluation == null)
                                <a href="{{ route('evaluations.facilitator_evaluation', ['url' => $facilitator->url]) }}" 
                                    class="btn btn-primary pull-right">Evaluate
                                </a>
                                @else
                                <span class="text-right">Evaluation Done</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                <a href="{{ route('home') }}" class="btn btn-info">Back to Index</a>
            </div>
        </div>
    </div>

</div>

</main>

@include('includes.footer')

@include('includes.jsincludes')

@stop