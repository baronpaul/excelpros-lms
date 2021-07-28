@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Facilitator Details</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.facilitators.index') }}">Facilitators</a>
          </li>
          
          <li class="active">
            Facilitator Details
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

                <div class="profile_wrapper">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="profile_pic">
                               <?php
                                if($facilitator->profile_pic == null || $facilitator->profile_pic == '') {
                                    $profile_pic = 'uploads/no-photo.png';
                                }
                                else {
                                    $profile_pic = $facilitator->profile_pic;
                                }
                               ?>
                               
                                <img src="{{ asset($profile_pic) }}" />
                                <div class="profile_pic_btn">
                                    <a href="{{ route('admin.facilitators.change_picture', ['id' => $facilitator->id]) }}">
                                        Update Picture
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="profile_info">
                                <div class="floating_btn">
                                    <a href="{{ route('admin.facilitators.edit', ['id' => $facilitator->id]) }}" class="">
                                        Edit facilitator
                                    </a>
                                </div>
                                
                                <h4>
                                    <i class="la la-user"></i> 
                                    Name: {{ $facilitator->name }}
                                </h4>

                                <p>
                                    <i class="la la-envelope"></i> 
                                    Email: {{ $facilitator->email }}
                                </p>

                                <p>
                                    <i class="la la-phone"></i> 
                                    Phone: {{ $facilitator->phone }}
                                </p>

                            </div>
                        </div>

                        <div class="col-md-10">
                            <br>
                            <p>Brief Bio:</p>
                            <p>{{ $facilitator->brief_bio }}</p>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
      </div>

      <div class="white-box">
          <div class="row">
              <div class="col-md-12">

                <h3>Facilitator Courses</h3>
                <div class="">
                    @if (isset($courses) && $courses->count() > 0)
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th width="15%">Course Name</th>
                                    <th width="55%">Description</th>
                                    <th width="10%" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                <tr>
                                    
                                    <td>{{ $course->course_name }}</td>
                                    
                                    <td>{{ $course->course_description }}</td>

                                    <td class="text-center">
                                    <div class="edit-btn-wrap">
                                        <div class="edit-btn">
                                            <a href="{{ route('admin.courses.detail', ['id' => $course->course_id]) }}" title="Detail">
                                                <i class="fa fa-eye"></i> 
                                            </a>
                                        </div>

                                        <div class="edit-btn">
                                            <a href="{{ route('admin.courses.edit', ['id' => $course->course_id]) }}" title="Edit Course">
                                                <i class="fa fa-edit"></i> 
                                            </a>
                                        </div>

                                        <div class="edit-btn">
                                            <a href="{{ route('admin.courses.delete', ['id' => $course->course_id]) }}" title="Delete Course">
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
