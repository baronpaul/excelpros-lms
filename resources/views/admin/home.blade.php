@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Dashboard</h4>
        
      <ol class="breadcrumb">
          <li class="active">
            Dashboard 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
        <div class="row">
        
            <div class="col-md-3 col-sm-6">
                <div class="tiles-style1 circle-icon white-box">
                    <div class="tiles-icon bg-primary"> <i class="las la-landmark"></i>  </div>
                    <div class="tiles-text text-right">
                    <h4><a href="{{ route('admin.organizations.index') }}">Organizations</a><br>
                        <span class="giant_txt">{{ $organizations_count }}</span></h4>
                    </div>
                </div>
            </div>


            <div class="col-md-3 col-sm-6">
                <div class="tiles-style1 circle-icon white-box">
                <div class="tiles-icon bg-primary"> <i class="las la-chalkboard"></i>  </div>
                <div class="tiles-text text-right">
                    <h4><a href="{{ route('admin.training_programs.index') }}">Courses</a><br>
                        <span class="giant_txt">{{ $training_programs_count }}</span></h4>
                </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="tiles-style1 circle-icon white-box">
                <div class="tiles-icon bg-primary"> <i class="las la-users"></i>  </div>
                <div class="tiles-text text-right">
                    <h4><a href="{{ route('admin.users.index') }}">Users</a>
                        <br><span class="giant_txt">{{ $users_count }}</span></h4>
                </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="tiles-style1 circle-icon white-box">
                <div class="tiles-icon bg-primary"> <i class="las la-chalkboard-teacher"></i>  </div>
                <div class="tiles-text text-right">
                    <h4><a href="{{ route('admin.facilitators.index') }}">Facilitators</a>
                        <br><span class="giant_txt">{{ $facilitators_count }}</span></h4>
                </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <h3>Courses</h3>
                        @if (isset($training_programs) && $training_programs->count() > 0)
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        
                                        <th width="25%">Course Name</th>
                                        <th width="15%">Organization</th>
                                        <th width="45%" style="text-align: center">Description</th>
                                        <th width="15%" class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($training_programs as $training_program)
                                    <tr>
                                        
                                        <td>{{ $training_program->program_name }}</td>

                                        <td>{{ $training_program->org_name }}</td>
                                        
                                        <td>
                                            <?php 
                                                $tagless_content = strip_tags($training_program->program_description);
                                            ?>
                                            {{ str_limit($tagless_content, 150) }}
                                        </td>
                                         
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
                            <p>There are no courses to display</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>  

  </div>
</div>

@endsection


