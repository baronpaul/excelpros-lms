@extends('layouts.mainlayout')

@section('content')

<main>

@include('includes.nav')

<div id="page_wrapper" class="pt-50 pb-50">

    <div class="container">
    
        <div class="row">
        
            <div class="col-md-12">
                <div class="page_title">
                    <h2>My Profile</h2>
                </div>
            </div>
        
        </div>
        <hr>
        
        <div class="row">

            <div class="col-md-9">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Notification</strong>
                    {{ session()->get('success') }}
                </div>
                @elseif(Session::has('failed'))
                <div class="alert alert-danger" id="danger-alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Oops! </strong>
                    {{ session()->get('failed') }}
                </div>
                @endif

                <div class="profile_wrapper">
                    <div class="row">
                        
                        <div class="col-md-8">
                            <div class="profile_info">
                                <h3>{{ $user->firstname }} {{ $user->lastname }}</h3>
                                <p>
                                    <i class="lnr lnr-map-marker"></i> 
                                    {{ $user->address }}
                                </p>

                                <p>
                                    <i class="lnr lnr-envelope"></i> 
                                    {{ $user->email }}
                                </p>

                                <p>
                                    <i class="lnr lnr-phone"></i> 
                                    {{ $user->phone }}
                                </p>

                                <p>
                                    <i class="lnr lnr-calendar-full"></i> 
                                    {{ $user->date_of_birth }}
                                </p>

                                <p>
                                    <i class="lnr lnr-graduation-hat"></i> 
                                    {{ $user->certificate_name }}
                                </p>

                                <div class="btn_wrap">
                                    
                                    <a href="{{ route('profile.edit') }}" class="btn btn-danger">
                                        Edit Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="col-md-3">
                @include('includes.profile_sidebar')
            </div>
            
        </div>

    </div>

</div>

</main>

@include('includes.footer')

@include('includes.jsincludes')

@stop