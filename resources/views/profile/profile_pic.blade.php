@extends('layouts.mainlayout')

@section('content')

<main>

@include('includes.nav')

<div id="page_wrapper" class="pt-50 pb-50">

    <div class="container">
    
        <div class="row">
        
            <div class="col-sm-12">
            
                <div class="page_title">
                
                    <h2>Edit Profile Pic</h2>
                    
                </div>

            </div>
        
        </div>

        <hr>
        
        <div class="row">

            <div class="col-md-9">
                <div class="profile_wrapper">
            
                    <form method="POST" action="{{ route('profile.update_profile_pic') }}" enctype = "multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" value="{{ $user->id }}" >

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Select Image</label>

                            <div class="col-md-7">
                                <input type="file" id="profile_pic" class="form-control{{ $errors->has('profile_pic') ? ' is-invalid' : '' }}" name="profile_pic">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 text-right">
                                <button type="submit" class="btn btn-primary">
                                    Edit Profile Picture
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