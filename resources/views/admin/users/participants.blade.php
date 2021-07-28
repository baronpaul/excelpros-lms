@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Users</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          
          <li class="active">
            Users
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">
              <h4>{{ $organization->org_name }}</h4>
               @if (isset($users) && $users->count() > 0)
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="15%">Name</th>
                                <th width="20%">Email</th>
                                <th width="15%">Phone</th>
                                <th width="30%">Training Program</th>
                                <th width="15%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                
                                <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                
                                <td>{{ $user->email }}</td>
                                
                                <td>{{ $user->phone }}</td>

                                <td>{{ $user->program_name }}</td>
                                
                                <td class="text-center">
                                  <div class="edit-btn-wrap">
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.users.view', ['id' => $user->id]) }}" title="Detail">
                                        <i class="fa fa-eye"></i>
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" title="Edit Profile">
                                        <i class="fa fa-edit"></i> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.users.change_password', ['id' => $user->id]) }}" title="Change Password">
                                        <i class="fa fa-lock"></i> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.users.suspend', ['id' => $user->id]) }}" title="Suspend Account">
                                        <i class="fa fa-window-close-o"></i> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.users.delete', ['id' => $user->id]) }}" title="Delete User">
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
                    <p>There are record of users to display</p>
                @endif
            </div>


        </div>
      </div>

    </div>  

  </div>

</div>

@endsection
