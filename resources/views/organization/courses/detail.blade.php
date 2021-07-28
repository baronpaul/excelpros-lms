@extends('organization.layouts.mainsite')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Courses</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('organization.dashboard') }}">Dashboard </a>
          </li>

          <li class="active">
            Courses 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h4>
                        Welcome, {{ auth()->guard('organization')->user()->contact_person }} ({{ auth()->guard('organization')->user()->org_name }})
                    </h4>
                </div>

                <div class="white-box">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>{{ $course->program_name }}</h3>

                            <div class="">

                            </div>

                            <p>Duration: {{ $course->duration }} days</p>
                            <p>Start Date: {{date('d M Y',strtotime($course->start_date)) }}</p>
                        </div>
                    </div>
                </div>

                <div class="white-box">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Course Modules</h3>

                            @if(isset($course_modules) && $course_modules->count())
                                <table class="table table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="50%">Title</th>
                                            <th width="40%">Facilitator</th>
                                            <th width="10%">Day</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($course_modules as $module)
                                        <tr>
                                            <td>{{ $module->course_name }}</td>
                                            <td>
                                                <a href="{{ route('organization.courses.facilitator', ['url' => $module->url]) }}">
                                                    {{ $module->name }}
                                                </a>
                                            </td>
                                            <td>{{ $module->day }}</td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No course modules have been added</p>
                            @endif
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
            </div>
        </div>

    </div>  

  </div>
</div>

@endsection
