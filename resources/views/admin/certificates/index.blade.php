@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Certificates</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>
          
          <li class="active">
            Certificates
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      <div class="white-box">
        <div class="row">
          
          <div class="col-md-12">
              <div class="btn-wrap">
                <a href="{{ route('admin.certificates.create') }}" class="btn btn-info">Create Certificate</a>
              </div>
          </div>
        </div>
      </div>
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">

               @if (isset($certificates) && $certificates->count() > 0)
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th width="30%">Organization</th>
                                <th width="30%">Training Program</th>
                                <th width="20%">Certificate Style</th>
                                <th width="15%" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($certificates as $certificate)
                            <tr>
                                
                                <td>{{ $certificate->org_name }}</td>
                                
                                <td>{{ $certificate->program_name }}</td>

                                <td>{{ $certificate->style }}</td>

                                <td class="text-center">
                                  <div class="edit-btn-wrap">
                                    <!--<div class="edit-btn">
                                      <a href="{{ route('admin.certificates.detail', ['id' => $certificate->certificate_id]) }}" title="Detail">
                                        <i class="fa fa-eye"></i> 
                                      </a>
                                    </div>-->

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.certificates.edit', ['id' => $certificate->certificate_id]) }}" title="Edit Profile">
                                        <i class="fa fa-edit"></i> 
                                      </a>
                                    </div>

                                    <div class="edit-btn">
                                      <a href="{{ route('admin.certificates.delete', ['id' => $certificate->certificate_id]) }}" title="Delete Account">
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
                    <p>There are no certificate templates to display</p>
                @endif
            </div>


        </div>
      </div>

    </div>  

  </div>

</div>

@endsection
