@extends('admin.layouts.sitelayout')

@section('content')


<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">
      {{ $training_program->program_name  }}
      </h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.training_programs.participants', ['id' => $training_program->program_id]) }}">Training Program</a>
          </li>
          
          <li class="active">
            Participant Certificate
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      <div class="white-box">
        <div class="row">
          
          <div class="col-md-12">
              <div class="">
                
                <a href="{{ route('admin.training_programs.detail', ['id' => $training_program->program_id]) }}" class="btn btn-primary pull-right">
                    Back to Training Program
                </a>

              </div>
          </div>
        </div>
      </div>
      
      <div class="white-box">
        <div class="row">
            <div class="col-md-12 tasks_wrap">
                <h3>Participant's Certificate</h3>
                
                <div class="">
                    <p>Program Name: {{ $training_program->program_name }}</p>
                    <p>Name: {{ $participant->firstname }} {{ $participant->lastname }}</p>
                    <p>Email: {{{ $participant->email }}}</p>
                </div>
                <hr>
                <div class="">
                  @if($certificate_issuance == null)
                    <form action="{{ route('admin.users.issue_certificate') }}" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="program_id" value="{{ $training_program->program_id }}" />

                        <input type="hidden" name="participant_id" value="{{ $participant->id }}" />

                        @if($certificate != null)
                          <input type="hidden" name="certificate_id" value="{{ $certificate->certificate_id }}" />
                          <button type="submit" class="btn btn-info btn-lg">Generate Certficate</button>
                        @else
                          <p>You have not created a Certificate Template to issue to participants of the Training Program</p>
                          <div>
                            <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary btn-lg">Create Certificate Template</a>
                          </div>
                        @endif
                    </form>
                    @else
                      <a href="{{ route('admin.users.download_certificate', ['id' => $certificate_issuance->issue_id]) }}" class="btn btn-primary btn-lg">
                        Download Certificate
                      </a>
                      
                      <!--<a href="{{ route('admin.users.send_certificate', ['id' => $certificate_issuance->issue_id]) }}" class="btn btn-info btn-lg">
                        Send Certificate to Participant
                      </a>-->
                    @endif
                </div>
            </div>
        </div>
      </div>

    </div>  

  </div>

</div>

@endsection


@include('admin.includes.js_includes')

</body>
</html>
