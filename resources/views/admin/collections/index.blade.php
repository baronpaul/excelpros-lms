@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Question Collections</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          
          <li class="active">
            Question Collections
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">    
        <div class="row">
          <div class="col-md-2 col-sm-3 col-xs-12">
              <div class="btn-wrap">
                <a href="{{ route('admin.collections.create') }}" class="btn btn-info">New Collection</a>
              </div>
          </div>
          <div class="col-md-9 col-sm-9 col-xs-12">
            
          </div>
        </div>
      </div>

      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

              <h3>Question Collections</h3>
               @if (isset($collections) && $collections->count() > 0)
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="40%">Collection Title</th>

                                <!--<th width="40%">Training Program</th>-->
                                
                                <th width="20%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collections as $collection)
                            <tr>
                                <td>{{ $collection->collection_title }}</td>

                                <!--<td>{{ $collection->program_name }}</td>-->
                                
                                <td class="text-center">
                                  <div class="edit-btn-wrap">
                                    
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.collections.view', ['id' => $collection->collection_id]) }}" title="View Details">
                                        <img src="{{ asset('images/details_icon.png') }}"/> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.collections.edit', ['id' => $collection->collection_id]) }}" title="Edit collection">
                                        <img src="{{ asset('images/edit_icon.png') }}"/> 
                                      </a>
                                    </div>
                                    
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.collections.delete', ['id' => $collection->collection_id]) }}" title="Delete">
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
                    <p>There are no record of collections to display</p>
                @endif
            </div>


        </div>
      </div>

    </div>  

  </div>

</div>

@endsection
