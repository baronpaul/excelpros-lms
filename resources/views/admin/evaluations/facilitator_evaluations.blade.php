@extends('admin.layouts.sitelayout')

@section('content')

<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Facilitator Evaluations</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.evaluations.index') }}">Evaluations</a>
          </li>
          
          <li class="active">
            Facilitator Evaluations
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      
      <div class="white-box">
        <div class="row">
          
            <div class="col-md-12 tasks_wrap">
              <h3>{{ $training_program->program_name }}</h3>
                @if (isset($facilitators) && $facilitators->count() > 0)
                    
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="20%">Facilitator</th>
                                
                                <th width="15%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facilitators as $facilitator)
                            <tr>
                                
                                <td>{{ $facilitator->name }}</td>

                                <td class="text-center">
                                  <div class="edit-btn-wrap">
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.evaluations.facilitator_evaluation_detail', 
                                      ['id' => $training_program->program_id, 'fac_id' => $facilitator->id]) }}" title="Detail">
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
