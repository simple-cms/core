<!DOCTYPE html>
<html class="login-bg">
<head>
  <title>Detail Admin - Sign in</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap -->
  <link href="{{ url() }}/admin/css/bootstrap/bootstrap.css" rel="stylesheet">
  <link href="{{ url() }}/admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet">

  <!-- global styles -->
  <link rel="stylesheet" type="text/css" href="{{ url() }}/admin/css/compiled/layout.css">
  <link rel="stylesheet" type="text/css" href="{{ url() }}/admin/css/compiled/elements.css">
  <link rel="stylesheet" type="text/css" href="{{ url() }}/admin/css/compiled/icons.css">

  <!-- libraries -->
  <link rel="stylesheet" type="text/css" href="{{ url() }}/admin/css/lib/font-awesome.css">

  <!-- this page specific styles -->
  <link rel="stylesheet" href="{{ url() }}/admin/css/compiled/signin.css" type="text/css" media="screen" />

  <!-- open sans font -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
  <div class="login-wrapper">
    <div class="box">
      <div class="content-wrap">
        <h6>Log in</h6>

        @if (Session::get('message-content') != '')
        <div class="alert
          @if (Session::get('message-type') != '')
          alert-{{ Session::get('message-type') }}
          @endif">
          <a class="close" data-dismiss="alert" href="#">&times;</a>
          {{ Session::get('message-content') }}
        </div>
         @endif

        {{ Form::open(['method' => 'POST', 'route' => 'login']) }}
        {{ Form::email('email', null, ['autofocus' => 'autofocus', 'autocomplete' => 'off', 'class' => 'form-control', 'placeholder' => 'E-mail address']) }}
        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Your password']) }}
        <a href="#" class="forgot">Forgot password?</a>
        {{ Form::submit('Log in', ['class' => 'btn-glow primary login']) }}
        {{ Form::close() }}
      </div>
    </div>

    <div class="no-account">
      <p>Don't have an account?</p>
      <a href="signup.html">Sign up</a>
    </div>
  </div>

  <!-- scripts -->
  <script src="//code.jquery.com/jquery-latest.js"></script>
  <script src="{{ url() }}/admin/js/bootstrap.min.js"></script>
  <script src="{{ url() }}/admin/js/theme.js"></script>
</body>
</html>