<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <!-- Bootstrap 3.3.7 -->
  <link href="../../backend/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../../backend/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Ionicons -->
  <link href="../../backend/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet">
  <!-- Theme style -->
  <link href="../../backend/dist/css/AdminLTE.min.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../../backend/plugins/iCheck/square/blue.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="" method="post">
    	@csrf
      <div class="form-group has-feedback">
        <input class="form-control" name="email" type="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" name="password" type="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input style="background: rgb(255, 255, 255); margin: 0px; padding: 0px; border: 0px; border-image: none; left: -20%; top: -20%; width: 140%; height: 140%; display: block; position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="background: rgb(255, 255, 255); margin: 0px; padding: 0px; border: 0px; border-image: none; left: -20%; top: -20%; width: 140%; height: 140%; display: block; position: absolute; opacity: 0;"></ins></div> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button class="btn btn-primary btn-block btn-flat" type="submit">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a class="btn btn-block btn-social btn-facebook btn-flat" href="#"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a class="btn btn-block btn-social btn-google btn-flat" href="#"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a class="text-center" href="register.html">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../backend/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>


</body></html>