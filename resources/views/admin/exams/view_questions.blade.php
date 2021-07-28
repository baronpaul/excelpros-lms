@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Questions for {{ $exam->exam_title }}</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          
          <li class="active">
            View Questions
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

                <div class="task_wrap_title">Questions</div>
                @if (isset($questions) && $questions->count() > 0)
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="80%">Title</th>
                                
                                <th width="20%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $question)
                            <tr>
                                <td>{!! $question->question_name !!}</td>
                                
                                <td class="text-center">
                                  <div class="edit-btn-wrap">
                                    
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.questions.view', ['id' => $question->question_id]) }}" title="View Details">
                                        <img src="{{ asset('images/details_icon.png') }}"/> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.questions.edit', ['id' => $question->question_id]) }}" title="Edit question">
                                        <img src="{{ asset('images/edit_icon.png') }}"/> 
                                      </a>
                                    </div>

                                    
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.questions.delete', ['id' => $question->question_id]) }}" title="Delete">
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
                    <p>There are no questions to display</p>
                @endif

                <hr>
                <div class="btn-wrap">
                  <a href="{{ URL::previous() }}" class="btn btn-info btn-lg">Back to Exam</a>
                </div>
            </div>


        </div>
      </div>

    </div>  

  </div>

</div>

@endsection