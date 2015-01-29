<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SimpleCMS | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- bootstrap 3.0.2 -->
    <link href="{{ url() }}/assets/control/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{ url() }}/assets/control/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ url() }}/assets/control/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{ url() }}/assets/control/css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ url() }}/assets/control/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <link href="{{ url() }}/assets/control/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{ url() }}/assets/control/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{ url() }}/assets/control/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ url() }}/assets/control/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="skin-blue">
    @include('core::Admin/Partials/TopNavigation')

    <div class="wrapper row-offcanvas row-offcanvas-left">

    @include('core::Admin/Partials/Sidebar')

    @yield('content')

    </div>

    <!-- scripts -->
    <!-- jQuery 2.0.2 -->
    <script src="{{ url() }}/assets/control/js/jquery.min.js"></script>
    <!-- jQuery UI 1.10.3 -->
    <script src="{{ url() }}/assets/control/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="{{ url() }}/assets/control/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ url() }}/assets/control/js/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{{ url() }}/assets/control/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{ url() }}/assets/control/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="{{ url() }}/assets/control/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- fullCalendar -->
    <script src="{{ url() }}/assets/control/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url() }}/assets/control/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="{{ url() }}/assets/control/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ url() }}/assets/control/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ url() }}/assets/control/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

    <!-- AdminLTE App -->
    <script src="{{ url() }}/assets/control/js/AdminLTE/app.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url() }}/assets/control/js/AdminLTE/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ url() }}/assets/control/js/AdminLTE/demo.js" type="text/javascript"></script>
  </body>
</html>