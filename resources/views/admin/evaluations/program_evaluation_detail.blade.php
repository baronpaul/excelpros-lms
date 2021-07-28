@extends('admin.layouts.sitelayout')

@section('content')

<div class="sec_content">

  <div class="page-title-box">
      <h4 class="page-title">Course Evaluation Detail</h4>
        
      <ol class="breadcrumb">
          <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
          </li>

          <li>
            <a href="{{ route('admin.evaluations.index') }}">Evaluations</a>
          </li>
          
          <li class="active">
            Evaluation Detail
          </li>
      </ol>

      <div class="clearfix"></div>
  </div>

  <div class="row">

    <div class="col-md-12">
      
      
      <div class="white-box">
        <div class="row">
          
            <div class="col-md-12 tasks_wrap_short">
                <h3>{{ $training_program->program_name }}</h3>
                <h4>Participant: {{ $evaluation->firstname }} {{ $evaluation->lastname }}</h4>
            </div>

        </div>
      </div>

      <div class="white-box">
        <div class="row">
          
            <div class="col-md-12 tasks_wrap">
                <table class="table table-striped table-responsive">
                    <tbody>
                        <tr>
                            <td width="30%">What I learnt the most</td>
                            <td width="70%">{{ $evaluation->learned }}</td>
                        </tr>

                        <tr>
                            <td>What I will apply in my Job functions</td>
                            <td>{{ $evaluation->will_apply }}</td>
                        </tr>

                        <tr>
                            <td>Additional Training Needs</td>
                            <td>{{ $evaluation->additional_training_required }}</td>
                        </tr>

                        <tr>
                            <td>Content Quality</td>
                            <td>{{ $evaluation->content_quality_rating }}</td>
                        </tr>

                        <tr>
                            <td>Methodology</td>
                            <td>{{ $evaluation->methodology_rating }}</td>
                        </tr>

                        <tr>
                            <td>Materials Quality</td>
                            <td>{{ $evaluation->materials_quality_rating }}</td>
                        </tr>

                        <tr>
                            <td>Overall Rating</td>
                            <td>{{ $evaluation->overall_rating }}</td>
                        </tr>


                        <tr>
                            <td>Overall Comment</td>
                            <td>{{ $evaluation->overall_comment }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
      </div>

    </div>  

  </div>

</div>

@endsection
