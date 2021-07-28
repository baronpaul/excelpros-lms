@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">{{ $organization->org_name }}</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.organizations.index') }}">Organizations</a>
          </li>
          
          <li class="active">
            {{ $organization->org_name }}
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12">

                <div class="profile_wrapper">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="profile_pic">
                               <?php
                                    if($organization->logo == null || $organization->logo == '') {
                                        $org_logo = 'uploads/no-photo.png';
                                    }
                                    else {
                                        $org_logo = $organization->logo;
                                    }
                               ?>
                                <img src="{{ asset($org_logo) }}" />
                                <div class="profile_pic_btn">
                                    <a href="{{ route('admin.organizations.change_logo', ['id' => $organization->org_id]) }}">
                                        Update Logo
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="profile_info">
                                <div class="floating_btn">
                                    <a href="{{ route('admin.organizations.edit', ['id' => $organization->org_id]) }}" class="">
                                        Edit Organization
                                    </a>
                                </div>
                                
                                <p>
                                    <i class="lnr lnr-user"></i> 
                                    {{ $organization->contact_person }}
                                </p>

                                <p>
                                    <i class="lnr lnr-map-marker"></i> 
                                    {{ $organization->address }}
                                </p>

                                <p>
                                    <i class="lnr lnr-envelope"></i> 
                                    {{ $organization->email }}
                                </p>

                                <p>
                                    <i class="lnr lnr-phone"></i> 
                                    {{ $organization->phone }}
                                </p>

                            </div>
                        </div>
                    </div>
                    
                </div>
            
            </div>

        </div>
      </div>

      <div class="white-box">
        <div class="row">
            <div class="col-md-12">
                <h3>Courses</h3>
                @if(isset($training_programs) && $training_programs->count() > 0)
                    
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="20%">Program Name</th>
                                <th width="60%">Program Description</th>
                                <th width="15%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($training_programs as $training_program)
                            <tr>
                                <td>{{ $training_program->program_name }}</td>
                                <td>{!! $training_program->program_description !!}</td>
                                <td class="text-center">
                                    <div class="edit-btn-wrap">
                                      <div class="edit-btn">
                                        <a href="{{ route('admin.training_programs.detail', ['id' => $training_program->program_id]) }}" title="Detail">
                                          <i class="fa fa-eye"></i> 
                                        </a>
                                      </div>
  
                                      <div class="edit-btn">
                                        <a href="{{ route('admin.training_programs.edit', ['id' => $training_program->program_id]) }}" title="Edit Program">
                                          <i class="fa fa-edit"></i> 
                                        </a>
                                      </div>
  
                                      <div class="edit-btn">
                                        <a href="{{ route('admin.training_programs.delete', ['id' => $training_program->program_id]) }}" title="Delete Program">
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
                    <p>No training programs have been added</p>
                @endif
            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

@endsection

