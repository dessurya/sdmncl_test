<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>@yield('title')</title>
		<link href="{{ asset('asset/bootstrap-4.5.0-dist/css/bootstrap.min.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('asset/font-awesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('asset/pnotify/pnotify.custom.min.css') }}">
		<style type="text/css">
		body{
			background-color: rgb(250,250,250);
		}
		#footer{
			background-color: rgb(125,125,125);
			color: white;
		}
		#full-img{
			position: relative;
			width: 100%;
			/*height: 580px;*/
			height: 290px;
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
		.vertical-align{
			vertical-align: middle;
		}
		.d-table{
			display: table;
		}
		.d-table .d-table-row{
			display: table-row;
		}
		.d-table .d-table-row .d-table-cell{
			display: table-cell;
		}
		.openSection{
			padding: 40px 0;
		}
		.openSection-small{
			padding: 3px 0;
		}
		</style>
		@yield('css')
	</head>
	<body>
		@livewire('acc-public.navigasi')
		@yield('content')
		@livewire('acc-public.footer')
		<script type="text/javascript" src="{{ asset('asset/jquery/dist/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('asset/bootstrap-4.5.0-dist/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('asset/pnotify/pnotify.custom.min.js') }}"></script>
		@yield('js')
	</body>
</html>