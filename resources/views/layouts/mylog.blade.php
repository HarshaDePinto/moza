<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mozita Group ADMIN</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="{{ asset('public/vendor/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="{{ asset('public/vendor/font-awesome/css/font-awesome.min.css') }}">
  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="{{ asset('public/css/fontastic.css') }}">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <!-- jQuery Circle-->
  <link rel="stylesheet" href="{{ asset('public/css/grasp_mobile_progress_circle-1.0.0.min.css') }}">
  <!-- Custom Scrollbar-->
  <link rel="stylesheet" href="{{ asset('public/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="{{ asset('public/css/style.blue.css') }}" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <!-- Favicon-->
  <link rel="icon" href="https://mozita.co.nz/wp-content/uploads/2019/10/favicon-32x32.png" sizes="32x32">
  <link rel="icon" href="https://mozita.co.nz/wp-content/uploads/2019/10/android-icon-192x192.png" sizes="192x192">
  <link rel="apple-touch-icon-precomposed" href="https://mozita.co.nz/wp-content/uploads/2019/10/android-icon-192x192.png">
  <meta name="msapplication-TileImage" content="https://mozita.co.nz/wp-content/uploads/2019/10/android-icon-192x192.png">
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    @yield('content')
<!-- JavaScript files-->
    <script src="{{ asset('public/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('public/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>
    <script src="{{ asset('public/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('public/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('public/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('public/js/charts-home.js') }}"></script>
    <!-- Main File-->
    <script src="{{ asset('public/js/front.js') }}"></script>

</body>
</html>
