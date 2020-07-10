<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Admin Page - Login Area</title>
		<link href="{{ asset('asset/bootstrap-4.5.0-dist/css/bootstrap.min.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('asset/font-awesome/css/font-awesome.min.css') }}">
	</head>
	<body style="background-color: rgb(160,160,160);">
		<center>
			<img style="width: 20vw;" src="{{ asset('picture/_default/LOGO MUNCUL NIGERIA DAN MUNCUL MEKAR.png') }}">
		</center>
		<div style="width: 65%; margin: auto; padding: 20px; background-color: white; border-radius: 5px;">
			<center><h5>Login Area</h5></center>
			<hr>
			@if(Session::has('status'))
			<div class="alert alert-danger" role="alert">
				{{ Session::get('status') }}
			</div>
			@endif
			<form method="POST" action="{{ route('adminPage.login.exe') }}">
				{{ csrf_field() }}
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="email">Email</label>
								<input required type="email" class="form-control" name="email" id="email" aria-describedby="email">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="password">Password</label>
								<input required type="password" class="form-control" name="password" id="password" aria-describedby="password">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<button class="btn btn-outline-info btn-block">Login</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
