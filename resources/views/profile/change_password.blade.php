@extends('layouts.mainlayout')

@section('content')

<main>

@include('includes.nav')

<div id="page_wrapper" class="pt-50 pb-50">

    <div class="container">
    
        <div class="row">
        
            <div class="col-sm-12">
            
                <div class="page_title">
                
                    <h2>Change Password</h2>
                    
                </div>

            </div>
        
        </div>

        <hr>
        
        <div class="row">

            <div class="col-md-9">
                @if(Session::has('failed'))
                <div class="alert alert-danger" id="danger-alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Oops! </strong>
                    {{ session()->get('failed') }}
                </div>
                @endif

                <div class="profile_wrapper">
            
                    <form method="POST" action="{{ route('profile.do_change_password') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" value="{{ $user_id }}" >

                        <div class="form-group row">
                            <label for="old_password" class="col-md-3 col-form-label text-md-right">Old Password</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newpassword" class="col-md-3 col-form-label text-md-right">New Password</label>

                            <div class="col-md-7">
                                <input id="newpassword" type="password" class="form-control{{ $errors->has('newpassword') ? ' is-invalid' : '' }}" name="newpassword" required autofocus>

                                @if ($errors->has('newpassword'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('newpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" name="password-confirm" required>

                                @if ($errors->has('password-confirm'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password-confirm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 text-right">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>
                            </div>
                        </div>

                    </form>
                
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