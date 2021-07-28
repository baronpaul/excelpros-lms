@extends('admin.layouts.sitelayout')

@section('content')

<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Courses</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          
          <li class="active">
            Courses
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      <div class="white-box">
        <div class="row">
          
          <div class="col-md-3">
              <div class="">
                <a href="{{ route('admin.training_programs.create') }}" class="btn btn-info">Create Course</a>
              </div>
          </div>
        </div>
      </div>
      
      <div class="white-box">
        <div class="row">
          
            <div class="col-md-12 tasks_wrap">

                @if (isset($training_programs) && $training_programs->count() > 0)
                    
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="25%">Course Title</th>  
                                
                                <th width="15%">Organization Name</th>
                                
                                <th width="45%" style="text-align: center">Description</th>
                                
                                <th width="15%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($training_programs as $training_program)
                            <tr>
                                
                                <td>
                                  <a href="{{ route('admin.training_programs.detail', ['id' => $training_program->program_id]) }}" title="Detail">
                                    {{ $training_program->program_name }}
                                  </a>
                                </td>
                                
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

@endsection

