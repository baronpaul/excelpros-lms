<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">
  <div class="page-title-box">
      <h4 class="page-title">Select Training Program</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          <li>
            <a href="{{ route('admin.exams.index') }}">Exams </a>
          </li>
          <li class="active">
            Select Training Program 
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      <div class="row">
          
          <div class="col-md-12">
              
              <div class="white-box">
                  
                <div class="row">
                    <div class="col-md-12 tasks_wrap">

                        @if (isset($training_programs) && $training_programs->count() > 0)
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th width="15%">Organization Name</th>
                                        
                                        <th width="20%">Program Name</th>
                                        
                                        <th width="15%" class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($training_programs as $training_program)
                                    <tr>
                                        
                                        <td>{{ $training_program->org_name }}</td>
                                        
                                        <td>{{ $training_program->program_name }}</td>
                                        
                                        <td class="text-center">
                                          <div class="edit-btn-wrap">
                                            <div class="edit-btn">
                                              <a href="{{ route('admin.exams.create', ['id' => $training_program->program_id]) }}" title="Select Program">
                                                <i class="fa fa-plus"></i> 
                                              </a>
                                            </div>
                                            
                                          </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
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
