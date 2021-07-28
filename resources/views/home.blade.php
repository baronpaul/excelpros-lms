@extends('layouts.mainlayout')

@section('content')

<main>
    @if (Auth::guest())

        @include('welcome')

    @else

        @include('dashboard')

    @endif


</main>

@include('includes.footer')

@include('includes.loginpopup')

@include('includes.jsincludes')


<script src="{{ asset('js/home-popup.js') }}"></script>

@stop