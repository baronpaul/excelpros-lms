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
            <div class="col-md-12 tasks_wrap">

                @if (isset($collections) && $collections->count() > 0)
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="80%">Collection</th>
                                
                                <!--<th width="50%">Course</th>-->

                                <th width="15%" class="text-right">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($collections as $collection)
                            <tr>
                                
                                <td>
                                    {{ $collection->collection_title }}
                                </td>

                                
                                <td class="text-center">
                                  <div class="edit-btn-wrap">
                                    
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.questions.collection', ['id' => $collection->collection_id]) }}" title="View Details">
                                        <img src="{{ asset('images/details_icon.png') }}"/> 
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
            </div>


        </div>
      </div>

    </div>  

  </div>

</div>

@endsection