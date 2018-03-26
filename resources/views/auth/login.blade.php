<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href='{{asset("adminlte/bootstrap/dist/css/bootstrap.min.css")}}'>
  <!-- Font Awesome -->
  <link rel="stylesheet" href='{{asset("adminlte/font-awesome/css/font-awesome.min.css")}}'>
  <!-- Ionicons -->
  <link rel="stylesheet" href='{{asset("adminlte/Ionicons/css/ionicons.min.css")}}'>
  <!-- Theme style -->
  <link rel="stylesheet" href='{{asset("adminlte/css/AdminLTE.min.css")}}'>
  <!-- iCheck -->
  <link rel="stylesheet" href='{{asset("adminlte/plugins/iCheck/square/blue.css")}}'>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Blog</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf
      <div class="form-group{{ $errors->has('email') ? ' is-invalid' : '' }} has-feedback">
        <input type="email" class="form-control" placeholder="Correo" value="{{ old('email') }}" name="email" required autofocus>
        @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group{{ $errors->has('password') ? ' is-invalid' : '' }} has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
        @if ($errors->has('password'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox iCheck">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('Recordar') }}
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->

    <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Recuperar contraseña') }}
    </a>
    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src='{{asset("adminlte/jquery/dist/jquery.min.js")}}'></script>
<!-- Bootstrap 3.3.7 -->
<script src='{{asset("adminlte/bootstrap/dist/js/bootstrap.min.js")}}'></script>
<!-- iCheck -->
<script src='{{asset("adminlte/plugins/iCheck/icheck.min.js")}}'></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
