
@if (Auth::user()->role_id==1)
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mozita Students Admin</title>
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
    <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}">
  <!-- Favicon-->
    <link rel="icon" href="https://mozita.co.nz/wp-content/uploads/2019/10/favicon-32x32.png" sizes="32x32">
    <link rel="icon" href="https://mozita.co.nz/wp-content/uploads/2019/10/android-icon-192x192.png" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="https://mozita.co.nz/wp-content/uploads/2019/10/android-icon-192x192.png">
    <meta name="msapplication-TileImage" content="https://mozita.co.nz/wp-content/uploads/2019/10/android-icon-192x192.png">
  <!-- Tweaks for older IEs-->


  @yield('styles')

</head>

<body>
  <!-- Side Navbar -->
  <nav class="side-navbar">
    <div class="side-navbar-wrapper">
      <!-- Sidebar Header    -->
      <div class="sidenav-header d-flex align-items-center justify-content-center">
        <!-- User Info-->
        <div class="sidenav-header-inner text-center">
            <a href="{{route('user.show',Auth::user()->id)}}">
                @if (Auth::user()->image)
                <img class="rounded-circle mr-2" width="50" src="{{ asset('storage/app/public/'.Auth::user()->image) }}" alt="No Image">
                @else
                <img class="img-fluid rounded-circle" src="{{ asset('public/img/no.png') }}" alt="No Image">
                @endif
            </a>
            <h2 class="h5">
                <a href="{{route('user.show',Auth::user()->id)}}">{{ Auth::user()->name}}</a>
            </h2>
            <span>{{ Auth::user()->position}}</span>
        </div>

        <!-- Brand For Minimized-->
        <div class="sidenav-header-logo">
            <a href="{{route('home')}}" class="brand-small text-center">
                 <strong>M</strong>
                 <strong class="text-primary">Z</strong>
            </a>
        </div>
    </div>

    <!-- Sidebar Navigation Menus-->
      <div class="main-menu">
        <h5 class="sidenav-heading">Controllers</h5>
        <ul id="side-main-menu" class="side-menu list-unstyled">
            <li>
                <a href="{{route('adminStudent')}}">
                    <i class="fa fa-home" style="font-size:20px;color:#0099cc"></i>Home
                </a>
            </li>


            <li>
                <a href="#applicantdropdownDropdown" aria-expanded="false" data-toggle="collapse">
                    <i class="fa fa-users" style="font-size:20px;color:#208000"></i>Students
                </a>
                    <ul id="applicantdropdownDropdown" class="collapse list-unstyled ">
                        <li>
                            <a href="{{route('applicant.create')}}">
                                <i class="fa fa-plus-circle" style="font-size:20px;color:green"></i> Add Students
                            </a>
                        </li>

                        <li>
                            <a href="{{route('applicant.index')}}">
                                <i class="fa fa-caret-square-o-right" style="font-size:20px;color:blue"></i> Show All
                            </a>
                        </li>
                    </ul>
            </li>

            <li>
                <a href="#companydropdownDropdown" aria-expanded="false" data-toggle="collapse">
                    <i class="fa fa-university" style="font-size:20px;color:#995c00"></i> Colleges
                </a>
                    <ul id="companydropdownDropdown" class="collapse list-unstyled ">
                        <li>
                            <a href="{{route('company.create')}}">
                                <i class="fa fa-plus-circle" style="font-size:20px;color:green"></i> Add Colleges
                            </a>
                        </li>

                        <li>
                            <a href="{{route('company.index')}}">
                                <i class="fa fa-caret-square-o-right" style="font-size:20px;color:blue"></i> Show All
                            </a>
                        </li>
                    </ul>
            </li>



            <li>
                <a href="{{route('stuLev.index')}}" >
                    <i class="fa fa-mortar-board" style="font-size:20px;color:#ff9933"></i> Level
                </a>

            </li>

            <li>
                <a href="{{route('stuSub.index')}}" >
                    <i class="icon-check" style="font-size:20px;color:#ff4000"></i> Subjects
                </a>

            </li>
            <li>
                <a href="{{route('title.index')}}" >
                    <i class="fa fa-certificate" style="font-size:20px;color:#999900"></i> Courses
                </a>

            </li>
            <li>
                <a href="{{route('subscribe.index')}}" >
                    <i class="fa fa-bell" style="font-size:20px;color:#990033"></i> Subscribers
                </a>

            </li>
            <li>
                <a href="#userdropdownDropdown" aria-expanded="false" data-toggle="collapse">
                    <i class="fa fa-user-plus" style="font-size:20px;color:#ff3300"></i> Users
                </a>
                    <ul id="userdropdownDropdown" class="collapse list-unstyled ">
                        <li>
                            <a href="{{route('user.create')}}">
                                <i class="fa fa-plus-circle" style="font-size:20px;color:green"></i> Add User
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.index')}}">
                                <i class="fa fa-caret-square-o-right" style="font-size:20px;color:blue"></i> Show All
                            </a>
                        </li>
                    </ul>
            </li>

        </ul>
      </div>

    </div>
  </nav>

<!-- Head Navbar -->
  <div class="page">
    <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header">
                <a id="toggle-btn" href="#" class="menu-btn">
                    <i class="icon-bars"> </i>
                </a>
            <a href="{{route('welcome')}}" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block">
                    <strong class="text-primary">Mozita Students
                    </strong>
                    <span>ADMIN </span>
                    </div>
                </a>
            </div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">


                @yield('mail')
                @yield('users')

                  <!-- Log out-->
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                 </li>

                 <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    class="nav-link language dropdown-toggle"><span
                      class="d-none d-sm-inline-block">Panels</span></a>
                  <ul aria-labelledby="languages" class="dropdown-menu">
                    <li>
                    <a rel="nofollow" href="{{route('admin')}}" class="dropdown-item">
                            <span>
                                Recruitment
                            </span>
                        </a>
                    </li>
                    <li>
                        <a rel="nofollow" href="{{route('adminStudent')}}" class="dropdown-item">
                            <span>
                                Student
                            </span>
                        </a>
                    </li>

                  </ul>
                </li>

                    </ul>
                    </div>
                </div>
            </nav>
    </header>


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


    @yield('content')

    <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Z-Tech Digital (Pvt) Ltd &copy; 2017-2020</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="" class="external">Harsha De Pinto</a>
              </p>

            </div>
          </div>
        </div>
      </footer>

    </div>
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
    @yield('scripts')
</body>

</html>



@else

<h1 class="text-danger text-center">YOU DON'T HAVE PERMISSION TO ACCESS!!!!!!!!!!</h1>
@endif

