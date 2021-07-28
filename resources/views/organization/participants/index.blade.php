@extends('organization.layouts.mainsite')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Participants</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('organization.dashboard') }}">Dashboard </a>
          </li>

          <li class="active">
            Participants 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                  <h4>Welcome, {{ auth()->guard('organization')->user()->contact_person }} ({{ auth()->guard('organization')->user()->org_name }})</h4>
                  <hr>
                  <div class="content_area">
                      <h3>Participants</h3>

                      @if (isset($participants) && $participants->count() > 0)
                          <table class="table table-striped table-responsive">
                              <thead>
                                  <tr>
                                      <th width="20%">Name</th>
                                      <th width="20%">Email</th>
                                      <th width="15%">Phone</th>
                                      <th width="35%">Course</th>
                                      <th width="5%">Action</th>
                                  </tr>
                              </thead>

                              <tbody>
                                  @foreach ($participants as $participant)
                                  <tr>
                                      <td>{{ $participant->firstname }} {{ $participant->lastname }}</td>
                                      
                                      <td>
                                        {{ $participant->email }}
                                      </td>
                                      
                                      <td>
                                        {{ $participant->phone }}
                                      </td>

                                      <td>
                                        {{ $participant->program_name }}
                                      </td>

                                      <td>
                                          <div class="edit-btn-wrap">
                                              <div class="edit-btn">
                                                  <a href="{{ route('organization.participants.detail', ['id' => $participant->id]) }}" title="Detail">
                                                      <i class="fa fa-eye"></i> 
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
</div>

@endsection