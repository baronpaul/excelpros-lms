@extends('layouts.mainlayout')

@section('content')

<main>

@include('includes.nav')


<div id="page_wrapper" class="pt-50 pb-50">

    <div class="container">
    
        <div class="row">
        
            <div class="col-sm-12">
            
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Edit My Profile</h2>
                    </div>
                </div>

            </div>
        
        </div>

        <hr>
        
        <div class="row">

            <div class="col-md-9">
                <div class="profile_wrapper">
            
                    <form method="POST" action="{{ route('profile.update') }}" aria-label="{{ __('Register') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" value="{{ $user->id }}" >

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">First Name</label>

                            <div class="col-md-7">
                                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ $user->firstname }}" >

                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-3 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-7">
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ $user->lastname }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-3 col-form-label text-md-right">Phone</label>

                            <div class="col-md-7">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-3 col-form-label text-md-right">Address</label>

                            <div class="col-md-7">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $user->address }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-3 col-form-label text-md-right">City</label>

                            <div class="col-md-7">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $user->city }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state_id" class="col-md-3 control-label">State</label>

                            <div class="col-md-7">
                                <select name="state_id" class="form-control">
                                    <option >Select State</option>
                                    <?php
                                        $states = DB::table('states')->get();
                                    ?>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}" <?php if($state->id == $user->state_id) echo 'selected' ?>>{{ $state->state_name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('state_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-10 text-right">
                                <button type="submit" class="btn btn-primary">
                                    Edit Profile
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