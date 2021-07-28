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
                    
                    <div class="table-responsive">
                        <h3>Evaluations</h3>
                        
                        @if (isset($evaluations) && $evaluations->count() > 0)
                    
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th width="15%">Participant</th>
                                        <th width="8%">Topic Rating</th>
                                        <th width="8%">Content Knowledge</th>
                                        <th width="8%">Delivery Style</th>
                                        <th width="10%">Time Management</th>
                                        <th width="10%">Skill Trans Cap.</th>
                                        <th width="10%">Addressing Questions</th>
                                        <th width="10%">Overall Rating</th>
                                        <th width="20%">Overall Comment</th>
                                        
                                        <th width="5%" class="text-right">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($evaluations as $eval)
                                    <tr>
                                        
                                        <td>{{ $eval->firstname }} {{ $eval->lastname }}</td>
                                        
                                        <td>{{ $eval->topic_rating }}</td>

                                        <td>{{ $eval->content_knowledge_rating }}</td>

                                        <td>{{ $eval->content_delivery_style_rating }}</td>

                                        <td>{{ $eval->time_management_rating }}</td>

                                        <td>{{ $eval->skill_transfer_capability_rating }}</td>

                                        <td>{{ $eval->addressing_questions_rating }}</td>

                                        <td>{{ $eval->overall_rating }}</td>
                                        
                                        <td>{{ $eval->overall_comment }}</td>

                                        <td class="text-center">
                                            <div class="edit-btn-wrap">
                                                <div class="edit-btn">
                                                <a href="{{ route('facilitator.evaluations.participant', 
                                                ['id' => $eval->id, 'user_id' => $eval->user_id]) }}" title="Detail">
                                                    <i class="fa fa-eye"></i> 
                                                </a>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        @else
                            <p>There are no results to display</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>  

  </div>
</div>

@endsection
