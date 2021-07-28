@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">{{ $training_program->program_name }}</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          
          <li class="active">
            Participants
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
                
                <a href="{{ route('admin.users.create') }}" class="btn btn-info">Add Participant</a>

                <a href="{{ route('admin.users.upload_users') }}" class="btn btn-info">
                  Upload Multiple Participants
                </a>
                
                <a href="{{ route('admin.training_programs.detail', ['id' => $training_program->program_id]) }}" class="btn btn-info pull-right">
                    Back to Training Program</a>

              </div>
          </div>
        </div>
      </div>
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">
                <h3>Participants</h3>
               @if (isset($participants) && $participants->count() > 0)
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="20%">Name</th>
                                <th width="25%">Email</th>
                                <th width="15%">Phone</th>
                                <th width="10%">Status</th>
                                <th width="20%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($participants as $participant)
                            <tr>
                                
                                <td>{{ $participant->firstname }} {{ $participant->lastname }}</td>
                                
                                <td>{{ $participant->email }}</td>
                                
                                <td>{{ $participant->phone }}</td>

                                <td>{{ $participant->user_status }}</td>
                                
                                <td class="text-center">
                                  <div class="edit-btn-wrap">
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.users.view', ['id' => $participant->id]) }}" title="Detail">
                                        <i class="fa fa-eye"></i> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.users.edit', ['id' => $participant->id]) }}" title="Edit Profile">
                                        <i class="fa fa-edit"></i> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                        <a href="{{ route('admin.users.change_status', ['id' => $participant->id]) }}" title="Update Status">
                                          <i class="fa fa-graduation-cap"></i> 
                                        </a>
                                    </div>

                                    <div class="edit-btn">
                                        <a href="{{ route('admin.users.certificates', ['id' => $participant->id]) }}" title="Issue Certificate">
                                          <i class="fa fa-certificate"></i> 
                                        </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.users.change_password', ['id' => $participant->id]) }}" title="Change Password">
                                        <i class="fa fa-lock"></i> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.users.suspend', ['id' => $participant->id]) }}" title="Suspend Account">
                                        <i class="fa fa-trash"></i> 
                                      </a>
                                    </div>
                                    
                                  </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                @else
                    <p>There are no record of participants to display</p>
                @endif
            </div>


        </div>
      </div>

    </div>  

  </div>

</div>

@endsection

