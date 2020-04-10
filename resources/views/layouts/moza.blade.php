<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>
    @yield('title')
  </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">


    <!-- Favicons -->
    <link href="{{ asset('public/moza/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('public/moza/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('public/moza/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('public/moza/lib/nivo-slider/css/nivo-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('public/moza/lib/owlcarousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('public/moza/lib/owlcarousel/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('public/moza/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/moza/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/moza/lib/venobox/venobox.css') }}" rel="stylesheet">

    <!-- Nivo Slider Theme -->
    <link href="{{ asset('public/moza/css/nivo-slider-theme.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('public/moza/css/style.css') }}" rel="stylesheet">

    <!-- Responsive Stylesheet File -->
    <link href="{{ asset('public/moza/css/responsive.css') }}" rel="stylesheet">

    @yield('styles')
</head>

<body data-spy="scroll" data-target="#navbar-example">

    <div id="preloader"></div>

        @yield('header')

      <!-- header end -->

<!-- ======= Slider Section ======= -->

    @yield('slider')
<!-- End Slider -->


<!-- ======= Content Section ======= -->
    @yield('content')
<!-- End Content -->


 <!-- Start Footer bottom Area -->
 <footer>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div class="footer-logo">
                                <h2><span>Mozita</span>Group</h2>
                            </div>

                            <p>Mozita was created with the aim of adding value to the world. We pride ourselves on honesty, integrity, respect and excellence.We are 100% New Zealand owned.</p>
                            <div class="footer-icons">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/Mozita-Recruitment-New-Zealand-688061864900481/" target="blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div style="text-align:center;padding:1em 0;">
                        <h2><a style="text-decoration:none;" href="nz.php">New Zealand</a></h2> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=large&timezone=Pacific%2FAuckland" width="100%" height="140" frameborder="0" seamless></iframe>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div style="text-align:center;padding:1em 0;">
                        <h2><a style="text-decoration:none;" href="sl.php">Sri Lanka</a></h2> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=large&timezone=Asia%2FColombo" width="100%" height="140" frameborder="0" seamless></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="copyright text-center">
                        <p>
                            &copy; Copyright <strong>Z-Tech Digital (Pvt) Ltd</strong>. All Rights Reserved
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
    <script src="{{ asset('public/moza/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/moza/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/moza/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/moza/lib/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('public/moza/lib/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('public/moza/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('public/moza/lib/parallax/parallax.js') }}"></script>
    <script src="{{ asset('public/moza/') }}lib/easing/easing.min.js"></script>
    <script src="{{ asset('public/moza/lib/nivo-slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/moza/lib/appear/jquery.appear.js') }}"></script>
    <script src="{{ asset('public/moza/lib/isotope/isotope.pkgd.min.js') }}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('public/moza/contactform/contactform.js') }}"></script>

  <script src="{{ asset('public/moza/js/main.js') }}"></script>
</body>

</html>
