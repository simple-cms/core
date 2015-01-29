<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- META Data -->
    <meta charset="utf-8">
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDesciption }}">

    <!-- Open Graph Protocol -->
    @include('core::Public.Partials.Open-Graph-Protocol')

    <!-- Le styles -->
    <link rel="stylesheet" href="{{ url() }}/assets/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url() }}/assets/public/css/main.css">
  </head>

  <body>

    @include('core::Public.Partials.Navigation')

    @yield('content')

    @include('core::Public.Partials.Footer')

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