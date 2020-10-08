<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport"
	content="width=device-width, initial-scale=1, user-scalable=yes">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
	<script src="{{asset('js/app.js')}}" defer></script>

	<link href="{{asset('css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css">

	<script src="{{asset('js/moment-with-locales.min.js')}}" ></script>
	<script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
	
	
</head>
<body>
 
	<div class="container-fluid" style="margin-top: 100px">
 
		@yield('content')
	</div>
	<style type="text/css">
	.table {
		border-top: 2px solid #ccc;
 
	}
	</style>

</body>
</html>