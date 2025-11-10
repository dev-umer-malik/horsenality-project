<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    	
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
    	<link rel="icon" type="image/x-icon" href="{{asset('assets/img/icons/parelli_logo.ico')}}">
        
        <!-- Scripts -->
        
		<title>{{ config('app.name', 'Parelli Horsenality') }}</title>
		<link rel="stylesheet" href="{{asset('assets/style.css')}}">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://kit.fontawesome.com/a911938a09.js" crossorigin="anonymous"></script>
		<script src="{{asset('assets/main.js')}}"></script>
	</head>
	<body>
			@yield('navbar')
			@yield('content')
	</body>
</html>
