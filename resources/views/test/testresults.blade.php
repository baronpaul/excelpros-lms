@extends('layouts.mainlayout')

@section('content')


<main>

<style type="text/css">
#regiration_form fieldset:not(:first-of-type) {
    display: none;
}

.form_wrap {
    width: 100%;
    height: auto;
    padding: 20px;
    border: solid 1px #ddd;
    border-radius: 6px;
}
.mt100 {
    margin-top: 100px;
}
</style>

@include('includes.nav')

<div id="page_wrapper" class="pt-50">

    <div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <div class="page_title text-center">
                    <h1>Your Test Results</h1>
                </div>

                <div class="page_content text-center">
                    
                    

                </div>
            </div>

        </div>

        
    </div>

</div>

</main>

@include('includes.footer')

@include('includes.jsincludes')


@stop