@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Course Modules</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li class="active">
            Course Modules
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
        
        <div class="white-box">
            <div class="row">
                <div class="col-md-12 tasks_wrap">
                    
                    <h3>Courses</h3>
                    
                    <div class="">
                        @if (isset($courses) && $courses->count() > 0)
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th width="20%">Training Program</th>
                                        
                                        <th width="20%">Course Name</th>
                                        
                                        <th width="15%">Organization</th>
                                        
                                        <th width="20%">Facilitator</th>
                                        
                                        <th width="15%" class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                    <tr>
                                        
                                        <td>{{ $course->program_name }}</td>

                                        <td>{{ $course->course_name }}</td>
                                        
                                        <td>{{ $course->org_name }}</td>
                                        
                                        <td>{{ $course->name }}</td>
                                        
                                        <td class="text-center">
                                        <div class="edit-btn-wrap">
                                            <div class="edit-btn">
                                            <a href="{{ route('admin.courses.detail', ['id' => $course->course_id]) }}" title="Detail">
                                                <i class="fa fa-eye"></i> 
                                            </a>
                                            </div>

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
                            <p>No courses have been added to this training program</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>  

  </div>

</div>

@endsection

