@extends('organization.layouts.mainsite')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Assessment</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('org.home') }}">Dashboard </a>
          </li>

          <li class="active">
            Assessment 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h4>Welcome, {{ auth()->guard('organization')->user()->contact_person }} ({{ auth()->guard('organization')->user()->org_name }})</h4>
                    <hr>
                    <div class="table-responsive">
                      <h3>Assessments</h3>
                      @if (isset($exams) && $exams->count() > 0)
                          <table class="table table-striped table-responsive">
                              <thead>
                                  <tr>
                                      <th width="40%">Title</th>
                                      <th width="40%">Course Name</th>
                                      <th width="10%">Action</th>
                                  </tr>
                              </thead>

                              <tbody>
                                  @foreach ($exams as $exam)
                                  <tr>
                                      <td>{{ $exam->exam_title }}</td>
                                      
                                      <td>{{ $exam->program_name }}</td>
                                      
                                      <td>
                                          <div class="edit-btn-wrap">
                                              <div class="edit-btn">
                                                  <a href="{{ route('organization.assessment.detail', ['id' => $exam->exam_id]) }}" title="Detail">
                                                      <i class="fa fa-eye"></i> 
                                                  </a>
                                              </div>

                                              <div class="edit-btn">
                                                <a href="{{ route('organization.assessment.questions', ['id' => $exam->exam_id]) }}" title="Questions">
                                                    <i class="fa fa-question-circle"></i> 
                                                </a>
                                              </div>
                                          </div>
                                      </td>
                                       
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      @else
                          <p>There are no record of assessments to display</p>
                      @endif
                    </div>
                </div>
            </div>
        </div>

    </div>  

  </div>
</div>

@endsection
