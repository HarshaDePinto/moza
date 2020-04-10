@extends('layouts.moza')

@section('title')
Mozita &#8211; Visa Services   &#8211; Be Where You Want To Be
@endsection

@section('header')

    <header>
        <!-- header-area start -->
        <div id="sticker" class="header-area">
        <div class="container">
            <div class="row">
                {{-- For Errors --}}

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="alert-group">
                                @foreach ($errors->all() as $error)
                                    <li class="alert-group-item text-danger">
                                    <h3>{{$error}}</h3>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                {{-- Massage --}}
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                    @endif

                    @if (session()->has('info'))
                        <div class="alert alert-info">
                            {{session()->get('info')}}
                        </div>
                    @endif

                    @if (session()->has('danger'))
                        <div class="alert alert-danger">
                            {{session()->get('danger')}}
                        </div>
                    @endif
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
                        <a href="#Study">
                                Study
                                <i class="fa fa-mortar-board"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#Work">
                                Work
                                <i class="fa fa-industry"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#Live">
                                Live
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#Invest">
                                Invest
                                <i class="fa fa-money"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#Visit">
                                Visit
                                <i class="fa fa-map-signs"></i>
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

                        <li>
                            <a href="#Contact">
                                Contact Us
                                <i class="fa fa-comment"></i>
                            </a>
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
            <img src="{{ asset('public/moza/img/slider/students.jpg') }}" alt="" title="#slider-direction-1" />
            <img src="{{ asset('public/moza/img/slider/working.jpg') }}" alt="" title="#slider-direction-2" />
            <img src="{{ asset('public/moza/img/slider/group.jpg') }}" alt="" title="#slider-direction-3" />
        </div>

        <!-- direction 1 -->
        <div id="slider-direction-1" class="slider-direction slider-one">
            <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="slider-content">
                    <!-- layer 1 -->
                    <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                    <h2 class="title1">With Mozita Visa Services </h2>
                    </div>
                    <!-- layer 2 -->
                    <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                    <h1 class="title2">You Can Be, Where You Want To Be</h1>
                    </div>
                    <!-- layer 3 -->
                    <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    <a class="ready-btn right-btn page-scroll" href="#Study">
                        Study
                        <i class="fa fa-mortar-board"></i>
                    </a>
                    <a class="ready-btn page-scroll" href="#Work">
                        Work
                                <i class="fa fa-industry"></i>
                    </a>
                    <a class="ready-btn right-btn page-scroll" href="#Live">
                        Live
                                <i class="fa fa-home"></i>
                    </a>
                    <a class="ready-btn page-scroll" href="#Invest">
                        Invest
                                <i class="fa fa-money"></i>
                    </a>
                    <a class="ready-btn right-btn page-scroll" href="#Visit">
                        Visit
                                <i class="fa fa-map-signs"></i>
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
                    <h2 class="title1">With Mozita Visa Services</h2>
                    </div>
                    <!-- layer 2 -->
                    <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                    <h1 class="title2">You Can Be, Where You Want To Be</h1>
                    </div>
                    <!-- layer 3 -->
                    <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <a class="ready-btn right-btn page-scroll" href="#Study">
                            Study
                            <i class="fa fa-mortar-board"></i>
                        </a>
                        <a class="ready-btn page-scroll" href="#Work">
                            Work
                                    <i class="fa fa-industry"></i>
                        </a>
                        <a class="ready-btn right-btn page-scroll" href="#Live">
                            Live
                                    <i class="fa fa-home"></i>
                        </a>
                        <a class="ready-btn page-scroll" href="#Invest">
                            Invest
                                    <i class="fa fa-money"></i>
                        </a>
                        <a class="ready-btn right-btn page-scroll" href="#Visit">
                            Visit
                                    <i class="fa fa-map-signs"></i>
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
                    <h2 class="title1">With Mozita Visa Services</h2>
                    </div>
                    <!-- layer 2 -->
                    <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                    <h1 class="title2">You Can Be, Where You Want To Be </h1>
                    </div>
                    <!-- layer 3 -->
                    <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <a class="ready-btn right-btn page-scroll" href="#Study">
                            Study
                            <i class="fa fa-mortar-board"></i>
                        </a>
                        <a class="ready-btn page-scroll" href="#Work">
                            Work
                                    <i class="fa fa-industry"></i>
                        </a>
                        <a class="ready-btn right-btn page-scroll" href="#Live">
                            Live
                                    <i class="fa fa-home"></i>
                        </a>
                        <a class="ready-btn page-scroll" href="#Invest">
                            Invest
                                    <i class="fa fa-money"></i>
                        </a>
                        <a class="ready-btn right-btn page-scroll" href="#Visit">
                            Visit
                                    <i class="fa fa-map-signs"></i>
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

@section('content')

<!-- Study start -->

<div id="Study" class="faq-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Study in New Zealand
            <a class="btn btn-success text-white btn-lg" href="{{route('newZealandVisaStudent')}}">Register </a>
            </h2>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="faq-details">
            <div class="panel-group" id="accordion">
              <!-- Why choose New Zealand? -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
											<a data-toggle="collapse" class="active" data-parent="#accordion" href="#check1">
                                                <span class="acc-icons"></span>Why choose New Zealand?
											</a>
										</h4>
                </div>
                <div id="check1" class="panel-collapse collapse in">
                  <div class="panel-body">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-menu">
                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs" role="tablist">
                            <li class="active">
                              <a href="#p-view-1" role="tab" data-toggle="tab">Quality education</a>
                            </li>
                            <li>
                              <a href="#p-view-2" role="tab" data-toggle="tab">A relaxed student lifestyle</a>
                            </li>
                            <li>
                              <a href="#p-view-3" role="tab" data-toggle="tab">Friendly locals</a>
                            </li>
                          </ul>
                        </div>
                        <div class="tab-content">
                          <div class="tab-pane active" id="p-view-1">
                            <div class="tab-inner">
                              <div class="event-content head-team">

                                <h4>Quality of Education</h4>

                                    <p class="a">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>



                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="p-view-2">
                            <div class="tab-inner">
                              <div class="event-content head-team">
                                <h4>A relaxed student lifestyle</h4>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="{{ asset('public/moza/img/study/s1.jpg') }}" class="img-fluid" alt="Responsive image">
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="a">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-12">
                                        <p class="a">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-center">
                                        <img src="{{ asset('public/moza/img/study/s2.jpg') }}" class="img-fluid " alt="Responsive image">
                                        </div>
                                    </div>

                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="p-view-3">
                            <div class="tab-inner">
                              <div class="event-content head-team">
                                <h4>Friendly locals</h4>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <p class="a">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="{{ asset('public/moza/img/study/s1.jpg') }}" class="img-fluid" alt="Responsive image">
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-sm-12">
                                        <p class="a">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-center">
                                        <img src="{{ asset('public/moza/img/study/s2.jpg') }}" class="img-fluid " alt="Responsive image">
                                        </div>
                                    </div>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>


                  </div>
                </div>
              </div>
              <!-- End Why choose New Zealand? -->
              <!-- What can I study? -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#check2">
                                                <span class="acc-icons"></span> What can I study?
											</a>
										</h4>
                </div>
                <div id="check2" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-menu">
                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs" role="tablist">
                            <li class="active">
                              <a href="#p-view-21" role="tab" data-toggle="tab">	Certificate</a>
                            </li>
                            <li>
                              <a href="#p-view-22" role="tab" data-toggle="tab">	Diploma</a>
                            </li>
                            <li>
                              <a href="#p-view-23" role="tab" data-toggle="tab">Under Graduate</a>
                            </li>
                            <li>
                                <a href="#p-view-24" role="tab" data-toggle="tab">Master's degree</a>
                            </li>
                            <li>
                                <a href="#p-view-25" role="tab" data-toggle="tab">Doctoral degree</a>
                            </li>


                          </ul>
                        </div>
                        <div class="tab-content">
                          <div class="tab-pane active" id="p-view-21">
                            <div class="tab-inner">
                              <div class="event-content head-team">

                                <h4>Certificate</h4>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <p class="a">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="{{ asset('public/moza/img/study/s1.jpg') }}" class="img-fluid" alt="Responsive image">
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-sm-12">
                                        <p class="a">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-center">
                                        <img src="{{ asset('public/moza/img/study/s2.jpg') }}" class="img-fluid " alt="Responsive image">
                                        </div>
                                    </div>

                                </div>

                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="p-view-22">
                            <div class="tab-inner">
                              <div class="event-content head-team">
                                <h4>Diploma</h4>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <p class="a">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="{{ asset('public/moza/img/study/s1.jpg') }}" class="img-fluid" alt="Responsive image">
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-sm-12">
                                        <p class="a">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-center">
                                        <img src="{{ asset('public/moza/img/study/s2.jpg') }}" class="img-fluid " alt="Responsive image">
                                        </div>
                                    </div>

                                </div>

                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="p-view-23">
                            <div class="tab-inner">
                              <div class="event-content head-team">
                                <h4>Under Graduate</h4>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <p class="a">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="{{ asset('public/moza/img/study/s1.jpg') }}" class="img-fluid" alt="Responsive image">
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-sm-12">
                                        <p class="a">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-center">
                                        <img src="{{ asset('public/moza/img/study/s2.jpg') }}" class="img-fluid " alt="Responsive image">
                                        </div>
                                    </div>

                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="p-view-24">
                            <div class="tab-inner">
                              <div class="event-content head-team">
                                <h4>Master's degree</h4>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <p class="a">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="{{ asset('public/moza/img/study/s1.jpg') }}" class="img-fluid" alt="Responsive image">
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-sm-12">
                                        <p class="a">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-center">
                                        <img src="{{ asset('public/moza/img/study/s2.jpg') }}" class="img-fluid " alt="Responsive image">
                                        </div>
                                    </div>

                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="p-view-25">
                            <div class="tab-inner">
                              <div class="event-content head-team">
                                <h4>Doctoral degree</h4>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <p class="a">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <img src="{{ asset('public/moza/img/study/s1.jpg') }}" class="img-fluid" alt="Responsive image">
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-sm-12">
                                        <p class="a">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-center">
                                        <img src="{{ asset('public/moza/img/study/s2.jpg') }}" class="img-fluid " alt="Responsive image">
                                        </div>
                                    </div>

                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End What can I study? -->
              <!-- Am I eligible? -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#check3">
                                                <span class="acc-icons"></span>Am I eligible?
											</a>
										</h4>
                </div>
                <div id="check3" class="panel-collapse collapse ">
                  <div class="panel-body">
                    <p>
                      Redug Lefes dolor sit amet, consectetur adipisicing elit. Aspernatur, tempore, commodi quas mollitia dolore magnam quidem repellat, culpa voluptates laboriosam maiores alias accusamus recusandae vero aperiam sint nulla beatae eos.
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Am I eligible? -->
              <!-- What will it cost? -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#check4">
                                                <span class="acc-icons"></span>What will it cost?
											</a>
										</h4>
                </div>
                <div id="check4" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      Redug Lefes dolor sit amet, consectetur adipisicing elit. Aspernatur, tempore, commodi quas mollitia dolore magnam quidem repellat, culpa voluptates laboriosam maiores alias accusamus recusandae vero aperiam sint nulla beatae eos.
                    </p>
                  </div>
                </div>
              </div>
              <!-- End What will it cost? -->
              <!-- What services are there? -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#check6">
                                                <span class="acc-icons"></span>What services are there?
											</a>
										</h4>
                </div>
                <div id="check6" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                      Redug Lefes dolor sit amet, consectetur adipisicing elit. Aspernatur, tempore, commodi quas mollitia dolore magnam quidem repellat, culpa voluptates laboriosam maiores alias accusamus recusandae vero aperiam sint nulla beatae eos.
                    </p>
                  </div>
                </div>
              </div>
              <!-- End What services are there? -->

              <!-- How do I apply? -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="check-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#check5">
                                                <span class="acc-icons"></span>How do I apply?
											</a>
										</h4>
                </div>
                <div id="check5" class="panel-collapse collapse">
                  <div class="panel-body">


                  </div>
                </div>
              </div>
              <!-- End How do I apply? -->


            </div>
          </div>
        </div>

      </div>
      <!-- end Row -->
    </div>
</div>

    <div class="wellcome-area">
        <div class="well-bg">
          <div class="test-overly"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="wellcome-text">
                  <div class="well-text text-center">
                    <h2>Mozita Student Visa Services</h2>
                    <p>
                        Please subscribe us for latest updates and offers. Be Where You want to Be…
                    </p>
                    <form  action="{{route('subscribe.store')}}" method="POST">
                    <div class="subs-feilds">

                      <div class="suscribe-input">

                            @csrf
                            <input type="email" class="email form-control width-80" id="email" name="email" placeholder="Email">
                            <input type="text"  id="type" name="type" value="Student" hidden>

                            <button type="submit" id="sus_submit" class="add-btn width-20">Subscribe</button>
                            <div id="msg_Submit" class="h3 text-center hidden">



                        </div>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
                </form>
            </div>
          </div>
        </div>
    </div>
<!-- End Study -->


<div id="Contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Contact us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-mobile"></i>
                            <p>
                                Call: +1 5589 55488 55<br>
                                <span>Monday-Friday (9am-5pm)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-envelope-o"></i>
                            <p>
                                Email: info@example.com<br>
                                <span>Web: www.example.com</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-map-marker"></i>
                            <p>
                                Location: 101 Springs Rd, Hornby, Christchurch 8042.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- Start Google Map -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!-- Start Map -->

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2891.6941620033244!2d172.53499441549437!3d-43.55041677912504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d321fdef0acaa19%3A0xbd779c948027592!2s101%20Springs%20Road%2C%20Hornby%2C%20Christchurch%208042%2C%20New%20Zealand!5e0!3m2!1sen!2slk!4v1584844221409!5m2!1sen!2slk" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <!-- End Map -->
                </div>
                <!-- End Google Map -->

                <!-- Start  contact -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form contact-form">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
                <!-- End Left contact -->
            </div>
        </div>
    </div>
</div>

@endsection

