@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Organizations</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          
          <li class="active">
            Organizations
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
                <a href="{{ route('admin.organizations.create') }}" class="btn btn-info">Create Organizations</a>
              </div>
          </div>
        </div>
      </div>
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

                @if (isset($organizations) && $organizations->count() > 0)
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="20%">Name</th>
                                <th width="20%">Contact Person</th>
                                <th width="23%">Email</th>
                                <th width="20%">Phone</th>
                                <th width="18%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($organizations as $organization)
                            <tr>
                                
                                <td>{{ $organization->org_name }}</td>
                                
                                <td>{{ $organization->contact_person }}</td>
                                
                                <td>{{ $organization->email }}</td>

                                <td>{{ $organization->phone }}</td>
                                
                                <td class="text-center">
                                  <div class="edit-btn-wrap">
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.organizations.detail', ['id' => $organization->org_id]) }}" title="Detail">
                                        <i class="fa fa-eye"></i> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.organizations.edit', ['id' => $organization->org_id]) }}" title="Edit Profile">
                                        <i class="fa fa-edit"></i> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.organizations.change_logo', ['id' => $organization->org_id]) }}" title="Change Logo">
                                        <i class="fa fa-image"></i> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.organizations.change_password', ['id' => $organization->org_id]) }}" title="Change Password">
                                        <i class="fa fa-user-secret"></i> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.organizations.delete', ['id' => $organization->org_id]) }}" title="Delete Account">
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
                    <p>There are no records of organizations to display</p>
                @endif

            </div>

        </div>
      </div>

    </div>  

  </div>

</div>

@endsection

