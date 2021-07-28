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
                    <h4>Welcome, {{ auth()->guard('organization')->user()->contact_person }} ({{ auth()->guard('organization')->user()->org_name }})</h4>
                    <hr>
                    <div class="content_area">
                      <h3>Courses</h3>
                      @if (isset($courses) && $courses->count() > 0)
                          <table class="table table-striped table-responsive">
                              <thead>
                                  <tr>
                                      <th width="25%">Course Name</th>
                                      <th width="40%">Description</th>
                                      <th width="15%">Start Date</th>
                                      <th width="10%">Duration</th>
                                      <th width="10%">Action</th>
                                  </tr>
                              </thead>

                              <tbody>
                                  @foreach ($courses as $course)
                                  <tr>
                                      <td>{{ $course->program_name }}</td>
                                      
                                      <td>
                                        <?php 
                                            $tagless_content = strip_tags($course->program_description);
                                        ?>
                                        {{ str_limit($tagless_content, 150) }}
                                      </td>
                                      
                                      <td>
                                        {{date('d M Y',strtotime($course->start_date)) }}
                                      </td>

                                      <td>
                                        {{ $course->duration }} days
                                      </td>

                                      <td>
                                          <div class="edit-btn-wrap">
                                              <div class="edit-btn">
                                                  <a href="{{ route('organization.courses.detail', ['id' => $course->program_id]) }}" title="Detail">
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
