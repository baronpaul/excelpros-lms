@extends('facilitator.layouts.facilitatorlayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Course Details</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('facilitator.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('facilitator.courses.index') }}">Courses</a>
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
                    <h3>{{ $course->org_name }} - {{ $course->program_name }}</h3>
                </div>
            </div>
        </div>
    
        <div class="white-box">
            <div class="row">
                <div class="col-md-12">
                    <h3>Course Description </h3>
                    <article>{!! $course->program_description !!}</article>
                    <hr>
                    <h4>Duration: {{ $course->duration }} days</h4>
                    <h4>Start Date: {{ $course->start_date }}</h4>

                    <h4>Module: {{ $course->course_name }} - Day: {{ $course->day }}</h4>
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

@endsection

