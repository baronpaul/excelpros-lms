@extends('facilitator.layouts.facilitatorlayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Evaluations</h4>
        
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
                        
                        @if (isset($training_programs) && $training_programs->count() > 0)
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th width="40%">Course Name</th>
                                        <th width="40%">Module</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($training_programs as $course)
                                    <tr>
                                        
                                        <td>{{ $course->program_name }}</td>
                                        
                                        <td>
                                            {{ $course->course_name }}
                                        </td>

                                        <td>
                                            <div class="edit-btn-wrap">
                                                <div class="edit-btn">
                                                    <a href="{{ route('facilitator.evaluations.detail', ['id' => $course->program_id]) }}" title="Detail">
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
                            <p>There are no record of courses to display</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>  

  </div>
</div>

@endsection
