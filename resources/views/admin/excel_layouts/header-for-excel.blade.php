<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Albadr Smart System">
		<link rel="icon" type="image/png" href="{{asset('img/favicon-fax.ico')}}">
		<title>{{env('APP_NAME')}}</title>

		<!-- Bootstrap Core CSS -->
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
		<link href="{{asset('css/bootstrap-rtl.min.css')}}" rel="stylesheet" />
		<!-- Custom CSS -->
		<link href="{{asset('css/style.css')}}" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

		@stack('style')
	</head>
	<body>
