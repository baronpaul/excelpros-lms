@extends('facilitator.layouts.facilitatorlayout')

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
            <div class="col-md-12">
                <div class="white-box">
                    
                    <div class="table-responsive">
                        <h3>Courses</h3>
                        @if (isset($courses) && $courses->count() > 0)
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th width="20%">Organization</th>
                                        <th width="35%">Course Name</th>
                                        <th width="25%">Module</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $course->org_name }}</td>
                                        
                                        <td>{{ $course->program_name }}</td>
                                        
                                        <td>
                                            {{ $course->course_name }}
                                        </td>

                                        <td>
                                            <div class="edit-btn-wrap">
                                                <div class="edit-btn">
                                                    <a href="{{ route('facilitator.courses.detail', ['id' => $course->course_id]) }}" title="Detail">
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
                            <p>There are no record of courses to display</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>  

  </div>
</div>

@endsection

