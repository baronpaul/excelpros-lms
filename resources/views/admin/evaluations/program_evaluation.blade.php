@extends('admin.layouts.sitelayout')

@section('content')

<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Course Evaluations</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.evaluations.index') }}">Evaluations</a>
          </li>
          
          <li class="active">
            Course Evaluation
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      <div class="white-box">
        <div class="row">
          <div class="col-md-12 tasks_wrap_short">
            <?php
              $num = $evaluations->count();
            ?>
            <h3>{{ $training_program->program_name }}</h3>
            <p>Total Respondents: {{ $num }}</p>
            @if($num > 0)
              <p>Average Materials Quality: {{ $total_materials_quality_rating/$num }}</p>
              <p>Average Methodology Rating: {{ $total_method_rating/$num }}</p>
              <p>Average Content Rating: {{ $total_content_rating/$num }}</p>
              <p>Average Overall Rating: {{ $total_overall_rating/$num }}</p>
            @endif

            <div class="floating_btn">
                <a href="{{ route('admin.evaluations.export_program_evaluation', ['id' => $training_program->program_id]) }}">Export Results</a>
            </div>
          </div>
        </div>
      </div>
      
      <div class="white-box">
        <div class="row">
          
            <div class="col-md-12 tasks_wrap">
              
                @if (isset($evaluations) && $evaluations->count() > 0)
                    
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="15%">Participant</th>
                                <th width="15%">Cont. Quality</th>
                                
                                <th width="15%">Mat. Quality</th>
                                <th width="15%">Methodology</th>
                                <th width="10%">Overall</th>
                                <th width="25%">Overall Comment</th>
                                
                                <th width="5%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evaluations as $eval)
                            <tr>
                                
                                <td>{{ $eval->firstname }} {{ $eval->lastname }}</td>
                                
                                <td>{{ $eval->content_quality_rating }}</td>
                                
                                <td>{{ $eval->materials_quality_rating }}</td>

                                <td>{{ $eval->methodology_rating }}</td>

                                <td>{{ $eval->overall_rating }}</td>

                                <td>{{ $eval->overall_comment }}</td>

                                <td class="text-center">
                                  <div class="edit-btn-wrap">
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.evaluations.program_evaluation_detail', ['id' => $eval->id]) }}" title="Detail">
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

@endsection

