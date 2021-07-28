@extends('facilitator.layouts.facilitatorlayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Evaluation Detail</h4>
        
      <ol class="breadcrumb">
            <li>
                <a href="{{ route('facilitator.home') }}">Dashboard</a>
            </li>  
            <li class="active">
                Evaluations 
            </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <div class="row">
                      
                        <div class="col-md-12 tasks_wrap_short">
                            <h3>{{ $training_program->program_name }}</h3>
                            <h4>Participant: {{ $evaluation->firstname }} {{ $evaluation->lastname }}</h4>
                            
                        </div>
            
                    </div>
                </div>

                <div class="white-box">
                    <div class="row">
                      
                        <div class="col-md-12 tasks_wrap">
                            <table class="table table-striped table-responsive">
                                <tbody>
                                    <tr>
                                        <td width="25%">Topic Rating</td>
                                        <td width="75%">{{ $evaluation->topic_rating }}</td>
                                    </tr>
            
                                    <tr>
                                        <td>Content Knowledge Rating</td>
                                        <td>{{ $evaluation->content_knowledge_rating }}</td>
                                    </tr>
            
                                    <tr>
                                        <td>Content Delivery Style Rating</td>
                                        <td>{{ $evaluation->content_delivery_style_rating }}</td>
                                    </tr>
            
            
                                    <tr>
                                        <td>Time Management Rating</td>
                                        <td>{{ $evaluation->time_management_rating }}</td>
                                    </tr>
            
                                    <tr>
                                        <td>Skill Transfer Capability Rating</td>
                                        <td>{{ $evaluation->skill_transfer_capability_rating }}</td>
                                    </tr>
            
                                    <tr>
                                        <td>Addressing Questions Rating</td>
                                        <td>{{ $evaluation->addressing_questions_rating }}</td>
                                    </tr>
            
                                    <tr>
                                        <td>Overall Rating</td>
                                        <td>{{ $evaluation->overall_rating }}</td>
                                    </tr>
            
                                    <tr>
                                        <td>Overall Comment</td>
                                        <td>{{ $evaluation->overall_comment }}</td>
                                    </tr>
            
                                </tbody>
                            </table>
                        </div>
            
                    </div>
                  </div>

            </div>
        </div>

    </div>  

  </div>
</div>

@endsection

