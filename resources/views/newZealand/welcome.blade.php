@extends('layouts.moza')

@section('title')
Mozita Group &#8211; New Zealand &#8211; Connecting talent with opportunity
@endsection

@section('header')
    <header>
        <!-- header-area start -->
        <div id="sticker" class="header-area">
        <div class="container">
            <div class="row">
            <div class="col-md-12 col-sm-12">

                <!-- Navigation -->
                <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                    <!-- Brand -->

                                    <a href="{{route('welcome')}}"><img src="{{ asset('public/moza/img/logo.png') }}" alt="" class="img-fluid"></a>


                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">
                                Automotive Repairs
                                <i class="fa fa-cogs"></i>
                            </a>
                        </li>
                        <li>
                            <a href="nzrecruit.php">
                                Recruitment Services
                                <i class="	fa fa-handshake-o"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('newZealandVisa')}}">
                                Visa Services
                                <i class="fa fa-address-book"></i>
                            </a>
                        </li>
                        <li>
                            <a href="nzdigital.php">
                                Digital Solutions
                                <i class="fa fa-laptop"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Country
                                <i class="fa fa-flag"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                              <li>
                                  <a href="{{route('newZealand')}}" >
                                    New Zealand
                                    <img src="{{ asset('public/moza/img/slider/new.png') }}" alt="" width="25">
                                    </a>
                                </li>

                                <li>
                                    <a href="#" >
                                        Sri Lanka
                                        <img src="{{ asset('public/moza/img/slider/sri.png') }}" alt="" width="25">
                                    </a>
                                </li>
                            </ul>
                          </li>


                        <li>
                            @if (Route::has('login'))

                                @auth
                                    <a href="{{ url('/home') }}">
                                        Home
                                        @if (Auth::user()->image)
                                    <img class=" img-circle" src="{{ asset('storage/app/public/'.Auth::user()->image) }}" alt="" width="25">
                                    @else
                                    <img class=" img-circle" src="{{ asset('public/img/no.png') }}" alt="" width="25">
                                    @endif
                                    </a>
                                @else
                                    <a href="{{ route('login') }}">
                                        Login
                                        <i class="fa fa-lock"></i>
                                    </a>
                                @endauth

                            @endif

                        </li>
                    </ul>
                </div>
                <!-- navbar-collapse -->
                </nav>
                <!-- END: Navigation -->
            </div>
            </div>
        </div>
        </div>
        <!-- header-area end -->
    </header>
@endsection

@section('slider')
    <div id="home" class="slider-area">
        <div class="bend niceties preview-2">
        <div id="ensign-nivoslider" class="slides">
            <img src="{{ asset('public/moza/img/slider/slider_new.jpg') }}" alt="" title="#slider-direction-1" />
            <img src="{{ asset('public/moza/img/slider/slider2.jpg') }}" alt="" title="#slider-direction-2" />
            <img src="{{ asset('public/moza/img/slider/slider3.jpg') }}" alt="" title="#slider-direction-3" />
        </div>

        <!-- direction 1 -->
        <div id="slider-direction-1" class="slider-direction slider-one">
            <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="slider-content">
                    <!-- layer 1 -->
                    <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                    <h2 class="title1">Mozita Group - New Zealand </h2>
                    </div>
                    <!-- layer 2 -->
                    <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                    <h1 class="title2">We're In The Business That Providing Quality Services</h1>
                    </div>
                    <!-- layer 3 -->
                    <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    <a class="ready-btn right-btn page-scroll" href="#services">
                        Automotive
                        <i class="fa fa-cogs"></i>
                    </a>
                    <a class="ready-btn page-scroll" href="{{route('newZealandVisa')}}">
                        Visa
                        <i class="fa fa-address-book"></i>
                    </a>
                    <a class="ready-btn right-btn page-scroll" href="#services">
                        Recruitment
                        <i class="	fa fa-handshake-o"></i>
                    </a>
                    <a class="ready-btn page-scroll" href="#about">
                        Digital
                        <i class="fa fa-laptop"></i>
                    </a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- direction 2 -->
        <div id="slider-direction-2" class="slider-direction slider-two">
            <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="slider-content text-center">
                    <!-- layer 1 -->
                    <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    <h2 class="title1">Mozita Group - New Zealand</h2>
                    </div>
                    <!-- layer 2 -->
                    <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                    <h1 class="title2">We're In The Business That Providing Quality Services</h1>
                    </div>
                    <!-- layer 3 -->
                    <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <a class="ready-btn right-btn page-scroll" href="#services">
                            Automotive
                            <i class="fa fa-cogs"></i>
                        </a>
                        <a class="ready-btn page-scroll" href="{{route('newZealandVisa')}}">
                            Visa
                            <i class="fa fa-address-book"></i>
                        </a>
                        <a class="ready-btn right-btn page-scroll" href="#services">
                            Recruitment
                            <i class="	fa fa-handshake-o"></i>
                        </a>
                        <a class="ready-btn page-scroll" href="#about">
                            Digital
                            <i class="fa fa-laptop"></i>
                        </a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- direction 3 -->
        <div id="slider-direction-3" class="slider-direction slider-two">
            <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="slider-content">
                    <!-- layer 1 -->
                    <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    <h2 class="title1">Mozita Group - New Zealand</h2>
                    </div>
                    <!-- layer 2 -->
                    <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                    <h1 class="title2">We're In The Business That Providing Quality Services </h1>
                    </div>
                    <!-- layer 3 -->
                    <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <a class="ready-btn right-btn page-scroll" href="#services">
                            Automotive
                            <i class="fa fa-cogs"></i>
                        </a>
                        <a class="ready-btn page-scroll" href="{{route('newZealandVisa')}}">
                            Visa
                            <i class="fa fa-address-book"></i>
                        </a>
                        <a class="ready-btn right-btn page-scroll" href="#services">
                            Recruitment
                            <i class="	fa fa-handshake-o"></i>
                        </a>
                        <a class="ready-btn page-scroll" href="#about">
                            Digital
                            <i class="fa fa-laptop"></i>
                        </a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection



