<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Informed LMS</title>

    <!-- Styles -->
    <link href="{{ asset('admin_assets/css/app.css') }}" rel="stylesheet">
    <style>
        #app {
            margin-top: 10%;
        }
    </style>
</head>

<body>

    <div id="app">
        
        @yield('content')

    </div>

    
@include('admin.includes.js_includes')

</body>
</html>
