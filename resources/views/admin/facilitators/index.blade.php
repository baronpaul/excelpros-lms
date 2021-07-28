@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Facilitators</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          
          <li class="active">
            Facilitators
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      <div class="white-box">
        <div class="row">
          
          <div class="col-md-12">
              <div class="btn-wrap">
                <a href="{{ route('admin.facilitators.create') }}" class="btn btn-info">Create Facilitator</a>
                <a href="{{ route('admin.facilitators.upload_facilitators') }}" class="btn btn-info">Upload Facilitators</a>
              </div>
          </div>
        </div>
      </div>
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

               @if (isset($facilitators) && $facilitators->count() > 0)
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="20%">Name</th>
                                <th width="25%">Email</th>
                                <th width="15%">Phone</th>
                                <th width="20%">Status</th>
                                <th width="20%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facilitators as $facilitator)
                            <tr>
                                
                                <td>{{ $facilitator->name }}</td>
                                
                                <td>{{ $facilitator->email }}</td>

                                <td>{{ $facilitator->phone }}</td>

                                <td>
                                  @if($facilitator->activated == 'yes')
                                  activated
                                  @else
                                  not activated
                                  @endif
                                </td>
                                
                                <td class="text-center">
                                  <div class="edit-btn-wrap">
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.facilitators.detail', ['id' => $facilitator->id]) }}" title="Detail">
                                        <i class="fa fa-eye"></i> 
                                      </a>
                                    </div>

                                    

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.facilitators.edit', ['id' => $facilitator->id]) }}" title="Edit Profile">
                                        <i class="fa fa-edit"></i> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.facilitators.change_picture', ['id' => $facilitator->id]) }}" title="Change Picture">
                                        <i class="fa fa-image"></i> 
                                      </a>
                                    </div>

                                    @if($facilitator->activated == 'no')
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.facilitators.activate', ['id' => $facilitator->id]) }}" title="Activate Account">
                                        <i class="fa fa-unlock"></i> 
                                      </a>
                                    </div>
                                    @else
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.facilitators.change_password', ['id' => $facilitator->id]) }}" title="Change Password">
                                        <i class="fa fa-user-secret"></i> 
                                      </a>
                                    </div>
                                    @endif

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.facilitators.delete', ['id' => $facilitator->id]) }}" title="Delete Account">
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
                    <p>There are no facilitators to display</p>
                @endif
            </div>


        </div>
      </div>

    </div>  

  </div>

</div>

@endsection