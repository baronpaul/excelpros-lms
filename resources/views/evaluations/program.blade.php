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

                <form action="{{ route('evaluations.store_program_evaluation') }}" method="POST">
                    {{ csrf_field() }}

                    <input type="hidden" name="user_id" value="{{ $user_id }}">

                    <input type="hidden" name="program_id" value="{{ $training_program->program_id }}">


                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="learned">What I Learnt The Most</label>
                                <textarea name="learned" class="form-control" cols="5"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="will_apply">What I Will Apply To My Job Functions</label>
                                <textarea name="will_apply" class="form-control" cols="5"></textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="additional_training_required">State Additional Training Needs</label>
                                <textarea name="additional_training_required" class="form-control" cols="5"></textarea>
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="content_quality_rating">Content Quality</label>
                                <select name="content_quality_rating" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="methodology_rating">Methodology</label>
                                <select name="methodology_rating" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="materials_quality_rating">Quality of Training Materials</label>
                                <select name="materials_quality_rating" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="overall_rating">Overall Rating</label>
                                <select name="overall_rating" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="overall_comment">Overall Comment</label>
                                <textarea name="overall_comment" class="form-control" cols="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit Evaluation</button>
                            <a href="{{ route('evaluations.index') }}" class="btn btn-info">Back to Evaluations Index</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

</main>

@include('includes.footer')

@include('includes.jsincludes')

@stop