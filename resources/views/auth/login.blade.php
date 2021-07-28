@extends('layouts.mainlayout')

@section('content')

@include('includes.nav')

<div id="page_wrapper" class="pt-50 pb-50">
    <div class="container">
        <div class="row">
        
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            
                <div class="page_title">
                
                    <h2>Login</h2>
                    
                </div>

            </div>
        
        </div>

        <hr>

        <div class="row justify-content-center pt-50">
            <div class="col-md-6 col-md-offset-3">
                <div class="card">
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-7">
                                    <input type="password" id="password" data-toggle="password" 
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    <span toggle="#password" class=" field-icon toggle-password"></span>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="remember">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    
                    <hr style="margin: 15px 0">
                            
                    <!--<div class="row">
                        <div class="col-md-12 text-center">
                            <p>Not signed up?</p>
                            <a href="{{ route('register') }}" class="btn btn-primary">Sign up</a>
                        </div>
                    </div>-->

                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@include('includes.jsincludes')
