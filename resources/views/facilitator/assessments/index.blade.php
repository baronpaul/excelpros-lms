@extends('facilitator.layouts.facilitatorlayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Dashboard</h4>
        
      <ol class="breadcrumb">
        <li>
            <a href="{{ route('facilitator.home') }}">Dashboard</a>
        </li>  
        <li class="active">
            Assessments 
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
                        <h3>Assessments</h3>
                        @if (isset($exams) && $exams->count() > 0)
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th width="20%">Title</th>
                                        <th width="35%">Course Name</th>
                                        <th width="25%">Module</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($exams as $exam)
                                    <tr>
                                        <td>{{ $exam->exam_title }}</td>
                                        
                                        <td>{{ $exam->program_name }}</td>
                                        
                                        <td>
                                            {{ $exam->org_name }}
                                        </td>

                                        <td>
                                            <div class="edit-btn-wrap">
                                                <div class="edit-btn">
                                                    <a href="{{ route('facilitator.assessment.detail', ['id' => $exam->exam_id]) }}" title="Detail">
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

