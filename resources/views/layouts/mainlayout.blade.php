<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>
		ExcelPros LMS
	</title>

	<meta name="description" content="@if(isset($description)){{ $description }}@endif" />
	
	<meta name="keywords" content="@if(isset($meta_tags)){{ $meta_tags }}@endif" />
	
	<meta name="author" content="Paul Anyiam">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;400;500;600;800;900&display=swap" rel="stylesheet">
	
	<!-- CSS Plugins -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

	<link href="{{ asset('css/line-awesome.css') }}" rel="stylesheet">

	<link href="{{ asset('css/reset.css') }}" rel="stylesheet">
	
	<!--<link href="{{ asset('css/main.css') }}" rel="stylesheet">-->
	
	<link href="{{ asset('css/additional.css') }}" rel="stylesheet">

  	<link href="{{ asset('admin_assets/css/summernote.css') }}" rel="stylesheet">

</head>

<!--[if IE]>
  	<p class="browserupgrade">
	  You are using an <strong>outdated</strong> browser. 
	  Please <a href="http://browsehappy.com/">upgrade your browser</a> 
	  or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.
	</p>
<![endif]-->

<body class="">


@yield('content')


</body>
</html>