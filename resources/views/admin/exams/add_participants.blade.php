@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Add Participants</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          
          <li class="active">
            Exams
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">
 
                @if (isset($users) && $users->count() > 0)
                <table class="table table-striped table-responsive">
                  <thead>
                      <tr>
                          <th width="40%">Name</th>
                          <th width="45%">Email</th>
                          
                          <th width="15%" class="text-right">
                            <label>
                              <input type="checkbox" name="select_all" id="select_all">
                              Select All
                            </label>
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                      <form action="{{ route('admin.exams.do_add_participants', ['exam_id' => $exam->exam_id]) }}" method="post">
                        {{ csrf_field() }}
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                            
                            <td>{{ $user->email }}</td>
                            
                            <td class="text-center">
                                <label>
                                    <input type="checkbox" name="users[]" value="{{ $user->id }}">
                                </label>
                            </td>
                        </tr>
                        @endforeach

                        <p>
                            <button type="submit" class="btn btn-info">Add Participants</button>
                        </p>
                      </form>
                  </tbody>
                </table>
                @else
                    <p>All available users have been added as participants</p>
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