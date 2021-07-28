@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Completed Tests</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          
          <li>
            <a href="{{ route('admin.exams.index') }}">Tests</a>
          </li>

          <li class="active">
            Completed Tests
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">    
        <div class="row">
          @include('admin.includes.tests_inner_nav')
        </div>
      </div>
      
      <div class="white-box">
        <div class="row">

            <div class="col-md-12 tasks_wrap">
 
              @if (isset($completed_exams) && $completed_exams->count() > 0)
                <table class="table table-striped table-responsive">
                  <thead>
                      <tr>
                          <th width="25%">Title</th>
                          <th width="20%">Collection</th>
                          <th width="15%">No of Questions</th>
                          <th width="15%">Time Limit (Mins)</th>
                          <th width="12.5%">Exam Type</th>
                          <th width="12.5%" class="text-right">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($completed_exams as $exam)
                      <tr>
                          <td>{{ $exam->exam_title }}</td>
                          
                          <td>
                          {{ $exam->collection_title }}
                          </td>
                          
                          <td>{{ $exam->number_of_questions }}</td>

                          <td>{{ $exam->time_limit }}</td>

                          <td>{{ $exam->exam_type }}</td>
                          
                          <td class="text-center">
                              <div class="edit-btn-wrap">
                                  
                                  <div class="edit-btn">
                                  <a href="{{ route('admin.exams.view', ['id' => $exam->exam_id]) }}" title="Details">
                                      <img src="{{ asset('images/details_icon.png') }}"/> 
                                  </a>
                                  </div>

                                  <div class="edit-btn">
                                      <a href="{{ route('admin.exams.edit', ['id' => $exam->exam_id]) }}" title="Edit exam">
                                          <img src="{{ asset('images/edit_icon.png') }}"/> 
                                      </a>
                                  </div>

                                  
                                  <div class="edit-btn">
                                  <a href="{{ route('admin.exams.delete', ['id' => $exam->exam_id]) }}" title="Delete">
                                      <img src="{{ asset('images/delete_icon.png') }}"/> 
                                  </a>
                                  </div>
                                  
                              </div>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              @else
                  <p>There are no record of completed exams to display</p>
              @endif
            
            </div>

        </div>
      </div>

    </div>  

  </div>

</div>

@endsection