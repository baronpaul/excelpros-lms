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
            <div class="col-md-10">
                <h4>{{ $organization->org_name }} - {{ $training_program->program_name }}</h4><br>
                <p>
                    Please evaluate the facilitator by proving your rating on each area of the course module. <br>
                    Please note that the rating is from 1 to 5 with 1 being lowest and 5 being highest
                </p>
                <hr>
                <form action="{{ route('evaluations.store_facilitator_evaluation') }}" method="POST">
                    {{ csrf_field() }}

                    <input type="hidden" name="program_id" value="{{ $training_program->program_id }}">

                    <input type="hidden" name="course_id" value="{{ $course->course_id }}">
                    
                    <input type="hidden" name="facilitator_id" value="{{ $facilitator->id }}">

                    <input type="hidden" name="user_id" value="{{ $user_id }}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facilitator_name">Name of Facilitator</label>
                                <input type="text" name="facilitator_name" class="form-control" value="{{ $facilitator->name }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="program_name">Course Title</label>
                                <input type="text" name="program_name" class="form-control" value="{{ $training_program->program_name }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="topic_rating">Rate Topic</label>
                                <select name="topic_rating" class="form-control">
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
                                <label for="content_knowledge_rating">Rate Content Knowledge</label>
                                <select name="content_knowledge_rating" class="form-control">
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
                                <label for="content_delivery_style_rating">Rate Content Delivery Style</label>
                                <select name="content_delivery_style_rating" class="form-control">
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
                                <label for="time_management_rating">Rate Time Management</label>
                                <select name="time_management_rating" class="form-control">
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
                                <label for="skill_transfer_capability_rating">Rate Skill Transfer Capability</label>
                                <select name="skill_transfer_capability_rating" class="form-control">
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
                                <label for="addressing_questions_rating">Rate Addressing of Questions</label>
                                <select name="addressing_questions_rating" class="form-control">
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
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="overall_comment">Overall Comment</label>
                                <textarea name="overall_comment" class="form-control" cols="7"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg">Submit Evaluation</button>
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