@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">{{ $training_program->program_name }}</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.participants', ['id' => $training_program->program_id]) }}">Training Program</a>
          </li>
          
          <li class="active">
            Change Status
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      <div class="white-box">
        <div class="row">
          
          <div class="col-md-12">
              <div class="">
                
                <a href="{{ route('admin.training_programs.detail', ['id' => $training_program->program_id]) }}" class="btn btn-primary pull-right">
                    Back to Training Program
                </a>

              </div>
          </div>
        </div>
      </div>
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">
                <div class="">
                    <h3>Change Participant Status</h3>
                    <p>Program Name: {{ $training_program->program_name }}</p>
                    <p>Name: {{ $user->firstname }} {{ $user->lastname }}</p>
                    <p>Email: {{{ $user->email }}}</p>
                </div>

                <hr>
                
                <div class="">
                    
                    <form action="{{ route('admin.users.update_status') }}" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" value="{{ $user->id }}" />

                        <input type="hidden" name="program_id" value="{{ $training_program->program_id }}" />

                        @if($user->evaluation == 'yes')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Select Participant Status</label>
                                    <select name="status" class="form-control">
                                        <option value="started" <?php if($user->user_status == 'started') echo 'selected' ?>>Started</option>
                                        <option value="completed" <?php if($user->user_status == 'completed') echo 'selected' ?>>Completed</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-info btn-lg">Update Status</button>
                        </div>
                        @else
                          <div class="alert alert-danger">You can not update status until the user completes evaluation</div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

@endsection


