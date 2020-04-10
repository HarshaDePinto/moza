@extends('layouts.moza')

@section('title')
Mozita &#8211; Student Visa Registation &#8211; Be Where You Want To Be
@endsection

@section('styles')
<style>


    /* Add padding to containers */
    .containerF {
      padding: 16px;
      background-color: white;
    }

    /* Full-width input fields */
    input[type=text], input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 25px;
    }

    /* Set a style for the submit button */
    .registerbtn {
      background-color: #4CAF50;
      color: white;
      padding: 16px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    .registerbtn:hover {
      opacity: 1;
    }

    /* Add a blue text color to links */
    a {
      color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
      background-color: #f1f1f1;
      text-align: center;
    }
    </style>
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
<div class="header-bg-student page-area">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2">Student Registation </h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <h2 class="title3">Mozita Visa Services New Zealand  </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('content')
<div id="Contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">


            <div class="row">

                <!-- Start Google Map -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <form  action="{{route('reg.store')}}" method="POST">
                        @csrf
                        <div class="containerF">
                          <h1 class="text-center">Registration form</h1>
                          <h4>Please fill in this form to join with us.</h4>
                          <hr>

                          <label for="email"><b>Email</b></label>
                          <input type="text" placeholder="Enter Email" name="email" required>

                          <label for="psw"><b>Password</b></label>
                          <input type="password" placeholder="Enter Password" name="psw" required>

                          <label for="psw-repeat"><b>Repeat Password</b></label>
                          <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                          <hr>
                          <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

                          <button type="submit" class="registerbtn">Register</button>
                        </div>

                        <div class="container signin">
                          <p>Already have an account? <a href="#">Sign in</a>.</p>
                        </div>
                      </form>
                </div>
                <!-- End Google Map -->


            </div>
        </div>
    </div>
</div>
@endsection
