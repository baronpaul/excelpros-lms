@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Course Details</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.index') }}">Training Program</a>
          </li>
          
          <li class="active">
            Course Details
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
    
        <div class="white-box">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.courses.edit', ['id' => $course->course_id]) }}" class="btn btn-info">Edit Course</a>
                    
                    <a href="{{ route('admin.courses.add_course_materials', ['id' => $course->course_id]) }}" class="btn btn-info">Add Course Materials</a>
                    
                    <a href="{{ route('admin.exams.create', ['id' => $course->course_id]) }}" class="btn btn-info">Create Assessment</a>

                    <a href="{{ route('admin.training_programs.detail', ['id' => $course->program_id]) }}" class="btn btn-info pull-right">
                        Back to Training Program</a>
                </div>
            </div>
        </div>
      
        <div class="white-box">
            <div class="row">
                <div class="col-md-12 tasks_wrap">
                    <h4>Training Program: {{ $course->program_name }}</h4>

                    <h4>Course Title: {{ $course->course_name }}</h4>
                
                    <p>Facilitator: {{ $course->name }}</p>
                </div>
            </div>
        </div>

        <div class="white-box">
            <div class="row">
                <div class="col-md-12">
                    <h3>Course Materials</h3>

                    @if(isset($course_materials) && $course_materials->count())
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th width="85%">Title</th>
                                    <th width="15%" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($course_materials as $course_material)
                                <tr>
                                    <td>{{ $course_material->title }}</td>
                                    <td>
                                        <div class="edit-btn-wrap">
                                            <div class="edit-btn">
                                                <a href="{{ url('/') }}/{{ $course_material->file }}" target="_blank" title="View File">
                                                    <i class="fa fa-eye"></i> 
                                                </a>
                                            </div>

                                            <div class="edit-btn">
                                                <a href="" title="Delete">
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
                        <p>No course materials have been uploaded.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="white-box">
            <div class="row">
                <div class="col-md-12">
                    <h3>Assignments</h3>

                    @if(isset($assignments) && $assignments->count())
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="25%">Title</th>
                                <th width="65%">Details</th>
                                <th width="10%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($assignments as $assignment)
                            <tr>
                                <td>{{ $assignment->title }}</td>
                                <td>{!! $assignment->details !!}</td>
                                <td>
                                    <div class="edit-btn-wrap">
                                        <div class="edit-btn">
                                            <a href="{{ route('admin.assignments.detail', ['id' => $assignment->assignment_id]) }}" title="View">
                                                <i class="fa fa-eye"></i> 
                                            </a>
                                        </div>

                                        <div class="edit-btn">
                                            <a href="{{ route('admin.assignments.edit', ['id' => $assignment->assignment_id]) }}" title="Edit">
                                                <i class="fa fa-edit"></i> 
                                            </a>
                                        </div>

                                        <div class="edit-btn">
                                            <a href="{{ route('admin.assignments.delete', ['id' => $assignment->assignment_id]) }}" title="Delete">
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
                        <p>No assignments have been uploaded.</p>
                    @endif
                </div>
            </div>
        </div>

    </div>  

  </div>

</div>

@endsection

