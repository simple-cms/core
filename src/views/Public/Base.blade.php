<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- META Data -->
    <meta charset="utf-8">
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDesciption }}">

    <!-- Open Graph Protocol -->
    <meta property='og:title' content='{{ $metaTitle }}' />
    <meta property='og:description' content='{{ $metaDesciption }}' />
    <meta property='og:site_name' content='' />
    <meta property='og:type' content='' />
    <meta property='og:url' content='{{ url() }}' />
    <meta property='og:image' content='' />

    <!-- Le styles -->
    <link rel="stylesheet" href="{{ url() }}/css/bootstrap.min.css">

    <style>
      body {
        margin-top: 50px;
      }
    </style>
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="{{ url() }}">{SiteName}</a>
            <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="/about">About</a></li>
              <li><a href="/contact">Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container white">
      @yield('content')

      <div class="row">
        <div class="span12">
          <p>&copy; Company 2012</p>
        </div>
      </div>
    </div>

    <!-- Le javascript -->
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
      var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src='//www.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
  </body>
</html>