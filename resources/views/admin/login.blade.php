<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ config('app.name') }} | @yield('title')</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{ asset('vendors/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('vendors/adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{ asset('vendors/adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('vendors/adminlte/dist/css/AdminLTE.min.css') }}">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{ asset('vendors/adminlte/dist/css/skins/_all-skins.min.css') }}">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{ asset('vendors/adminlte/plugins/iCheck/square/blue.css') }}">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	@yield('styles')
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="{{ url('/') }}"><b>LaNeta</b>2.0</a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">Inicio de sesión</p>

		<form method="POST" action="{{ route('admin.login') }}">
			
			{{ csrf_field() }}
			
			
			<div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
				<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				
				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
			</div>
			
			
			
			
			
			<div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
				<input id="password" type="password" class="form-control" name="password" required>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				
				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
			</div>
			
			
			
			
			
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
							<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuérdame
						</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
				</div>
				<!-- /.col -->
			</div>
		</form>
		
		{{-- 
		<div class="social-auth-links text-center">
			<p>- También puedes -</p>
			<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Iniciar sesión con Facebook</a>
			<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Iniciar sesión con Google+</a>
		</div>
		<!-- /.social-auth-links -->
		 --}}

		<a href="{{ route('admin.password.request') }}">Olvidé mi clave</a><br>
		{{-- <a href="{{ route('admin.register') }}" class="text-center">Registrar un nuevo usuario</a> --}}

	</div>
	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('vendors/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('vendors/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendors/adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('vendors/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
@yield('scripts')
</body>
</html>