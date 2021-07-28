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

               @if (isset($orgs) && $orgs->count() > 0)
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="15%">
                                  Organizations</th>
                                
                                <th width="15%" class="text-right">View Users</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orgs as $org)
                            <tr>
                                
                                <td>
                                  <a href="{{ route('admin.users.participants', ['id' => $org->org_id]) }}" title="View Users">
                                    {{ $org->org_name }}
                                  </a>
                                </td>
                                  
                                <td class="text-center">
                                  <div class="edit-btn-wrap">
                                    <div class="edit-btn">
                                      <a href="{{ route('admin.users.participants', ['id' => $org->org_id]) }}" title="View Users">
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
                    <p>There are record of users to display</p>
                @endif
            </div>


        </div>
      </div>

    </div>  

  </div>

</div>

@endsection

