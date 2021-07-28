@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Portal Administrators</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          
          <li class="active">
            Portal Admins
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">    
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="btn-wrap">
                <a href="{{ route('admin.portal_admins.create') }}" class="btn btn-info">Create Administrator</a>
              </div>
          </div>
          <div class="col-md-9 col-sm-9 col-xs-12">
            
          </div>
        </div>
      </div>

      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

               @if (isset($admins) && $admins->count() > 0)
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="20%">Name</th>
                                <th width="32%">Email</th>
                                <th width="20%">Permission</th>
                                <th width="20%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>
                                
                                <td>
                                  {{ $admin->email }}
                                </td>
                                
                                <td>{{ $admin->permission_title }}</td>
                                 
                                <td class="text-center">
                                  <div class="edit-btn-wrap">
                                    
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.portal_admins.edit', ['id' => $admin->id]) }}" title="Edit">
                                        <img src="{{ asset('images/edit_icon.png') }}"/> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.portal_admins.change_password', ['id' => $admin->id]) }}" title="Change Password">
                                        <img src="{{ asset('images/password_icon.png') }}"/> 
                                      </a>
                                    </div>
                                    
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.portal_admins.delete', ['id' => $admin->id]) }}" title="Delete">
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
                    <p>There are record of companies to display</p>
                @endif
            </div>


        </div>
      </div>

    </div>  

  </div>

</div>

@endsection