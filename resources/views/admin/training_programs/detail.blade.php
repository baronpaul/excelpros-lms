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
            <a href="{{ route('admin.training_programs.index') }}">Training Program</a>
          </li>
          
          <li class="active">
            Program Detail
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
        <div class="white-box">
            <div class="row">
                <div class="col-md-12">
                    
                        <a href="{{ route('admin.training_programs.edit', ['id' => $training_program->program_id]) }}" 
                            class="btn btn-info btn-sm">
                            Edit Course
                        </a>

                        <a href="{{ route('admin.courses.create', ['id' => $training_program->program_id]) }}" 
                            class="btn btn-info btn-sm">
                            Add Modules</a>

                        <a href="{{ route('admin.training_programs.add_course_material', ['id' => $training_program->program_id]) }}" 
                            class="btn btn-info btn-sm">
                            Add Course Materials
                        </a>
                        
                        <a href="{{ route('admin.users.create') }}" class="btn btn-info btn-sm">
                            Add Participant
                        </a>

                        <a href="{{ route('admin.users.upload_users') }}" class="btn btn-info btn-sm">
                            Upload Participants
                        </a>

                            
                        <a href="{{ route('admin.training_programs.end_training', ['id' => $training_program->program_id]) }}" 
                            class="btn btn-info btn-sm">
                            End Training Proogram
                        </a>

                        @if($training_program->program_status == 'completed')
                            
                            <a href="{{ route('admin.evaluations.program_evaluation', ['id' => $training_program->program_id]) }}" 
                                class="btn btn-info btn-sm">
                                Course Evaluations
                            </a>

                            <a href="{{ route('admin.evaluations.facilitator_evaluations', ['id' => $training_program->program_id]) }}" 
                                class="btn btn-info btn-sm">
                                Facilitator Evaluations
                            </a>
                        
                        @endif


                    <!--<a href="{{ route('admin.training_programs.index') }}" class="btn btn-primary pull-right">
                        Back to Index</a>-->
                </div>
            </div>
        </div>

        <div class="white-box">
            <div class="row">
                <div class="col-md-12">
                    <h4>Organization: {{ $training_program->org_name }}</h4>
                </div>
            </div>
        </div>
      
        <div class="white-box">
            <div class="row">
                <div class="col-md-12 tasks_wrap_short">
 
                    <h4>Course Description:</h4>

                    <article>
                        {!! $training_program->program_description !!}
                    </article>

                    </p>
                    <p>Program Status: {{ $training_program->program_status }}</p>

                    <p>Duration: {{ $training_program->duration }} days</p>

                    <p>Start Date: {{date('d F Y',strtotime($training_program->start_date)) }}</p>
                </div>
            </div>
        </div>
        

        <div class="white-box">
            <div class="row">
                <div class="col-md-12 tasks_wrap_short">
                    
                    <h3>Course Modules</h3>
                    <div class="">
                        @if (isset($courses) && $courses->count() > 0)
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th width="10%">Day</th>

                                        <th width="30%">Module</th>
                                        
                                        <th width="30%">Facilitator</th>
                                        
                                        <th width="20%" class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($courses as $course)
                                    
                                    <tr>
                                        
                                        <td>{{ $course->day }}</td>

                                        <td>{{ $course->course_name }}</td>
                                        
                                        <td>{{ $course->name }}</td>
                                        
                                        <td class="text-center">
                                            <div class="edit-btn-wrap">
                                                
                                                <div class="edit-btn">
                                                    <a href="{{ route('admin.courses.edit', ['id' => $course->course_id]) }}" title="Edit Program">
                                                        <i class="fa fa-edit"></i> 
                                                    </a>
                                                </div>

                                                <div class="edit-btn">
                                                    <a href="{{ route('admin.courses.delete', ['id' => $course->course_id]) }}" title="Delete Program">
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
                            <p>No course module has been added to this Course</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>

        <div class="white-box">
            <div class="row">
                <div class="col-md-12 tasks_wrap_short">
                    
                    <h3>Course Materials</h3>
                    <div class="">
                        @if (isset($course_materials) && $course_materials->count() > 0)
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th width="80%">Course Material Title</th>
                                        
                                        <th width="20%" class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($course_materials as $mat)
                                    
                                    <tr>
                                        
                                        <td>{{ $mat->title }}</td>

                                        <td class="text-center">
                                            <div class="edit-btn-wrap">
                                                
                                                <div class="edit-btn">
                                                    <a href="{{ url('/') }}/{{ $mat->file }}" target="_blank" title="View File">
                                                        <i class="fa fa-eye"></i> 
                                                    </a>
                                                </div>

                                                <div class="edit-btn">
                                                    <a href="{{ route('admin.training_programs.edit_course_material', ['id' => $mat->id]) }}" title="Update Material">
                                                        <i class="fa fa-edit"></i> 
                                                    </a>
                                                </div>

                                                <div class="edit-btn">
                                                    <a href="{{ route('admin.training_programs.delete_course_material', ['id' => $mat->id]) }}" title="Remove Material">
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
                            <p>No courses have been added to this training program</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>

        <div class="white-box">
            <div class="row">
                <div class="col-md-12 tasks_wrap_short">
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
    
                                        <!--<div class="edit-btn">
                                            <a href="{{ route('admin.users.change_status', ['id' => $participant->id]) }}" title="Update Status">
                                              <i class="fa fa-graduation-cap"></i> 
                                            </a>
                                        </div>-->
                                        
                                        @if($participant->user_status == 'completed')
                                        <div class="edit-btn">
                                            <a href="{{ route('admin.users.certificates', ['id' => $participant->id]) }}" title="Issue Certificate">
                                              <i class="fa fa-certificate"></i> 
                                            </a>
                                        </div>
                                        @endif
    
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

