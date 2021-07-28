@extends('layouts.mainlayout')

@section('content')

<main>

@include('includes.nav')

<div id="page_wrapper" class="pt-50 pb-50">

    <div class="container">
        
        <div class="profile_wrap">
            <div class="row">
              <div class="col-md-3">
                <div class="profile_pix">
                  <div class="profile_pix_ins">
                    @if($facilitator->profile_pic != null)
                        <img src="{{ asset($facilitator->profile_pic) }}">
                    @else
                        <img src="{{ asset('uploads/no_image.png') }}">
                    @endif
                  </div>
                </div>
              </div>

              <div class="col-md-8">
                <div class="profile_details">
                  
                  <h3>{{ $facilitator->name }}</h3>
                  <h5>Email: {{ $facilitator->email }}</h5>
                  <h5>Phone: {{ $facilitator->phone }}</h5><br>

                  <div class="well">
                      <h5>Brief Bio</h5>
                      <div class="detail_bloc">
                          {!! $facilitator->brief_bio !!}
                      </div>
                  </div>

                  <!--<a href="" class="btn btn-primary">Send Message</a>-->
                  
                </div>
              </div>

            </div>
        </div>
    </div>

</div>

</main>

@include('includes.footer')

@include('includes.jsincludes')

@stop