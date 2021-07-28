@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Questions</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          
          <li class="active">
            Questions
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">    
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="">
                <a href="{{ route('admin.questions.create', ['id' => $collection->collection_id]) }}" class="btn btn-primary">New Question</a>
              </div>
          </div>
          <div class="col-md-9 col-sm-9 col-xs-12">
            
          </div>
        </div>
      </div>

      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">
                <h4>{{ $collection->collection_title }}</h4>
        
                @if (isset($questions) && $questions->count() > 0)
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="80%">Question</th>
                                
                                <th width="15%" class="text-right">Action</th>
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
                    <p>There are no record of questions to display</p>
                @endif
            </div>


        </div>
      </div>

    </div>  

  </div>

</div>

@endsection