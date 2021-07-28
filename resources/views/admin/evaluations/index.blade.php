@extends('admin.layouts.sitelayout')

@section('content')

<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Evaluations</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li class="active">
            Evaluations
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
          
            <div class="col-md-12 tasks_wrap">
              
                @if (isset($training_programs) && $training_programs->count() > 0)
                    
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="50%">Course Title</th>
                                
                                <th width="40%">Organization</th>
                                
                                <th width="10%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($training_programs as $course)
                            <tr>
                                
                                <td>{{ $course->program_name }}</td>
                                
                                <td>{{ $course->org_name }}</td>
                                
                                <td class="text-center">
                                  <div class="edit-btn-wrap">
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.evaluations.program_evaluation', ['id' => $course->program_id]) }}" title="Course Evaluation">
                                        <i class="las la-chalkboard"></i> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                        <a href="{{ route('admin.evaluations.facilitator_evaluations', ['id' => $course->program_id]) }}" 
                                            title="Facilitator Evaluations">
                                          <i class="las la-user"></i> 
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
