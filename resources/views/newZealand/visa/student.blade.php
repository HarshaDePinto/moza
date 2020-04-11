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
    input[type=text], input[type=password],select {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus,select:focus {
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
    <style>

        /*the container must be positioned relative:*/
        .autocomplete {
        position: relative;
        display: inline-block;
        }

        input {
        border: 1px solid transparent;
        background-color: #f1f1f1;
        padding: 10px;
        font-size: 16px;
        }

        input[type=text] {
        background-color: #f1f1f1;
        width: 100%;
        }

        input[type=submit] {
        background-color: DodgerBlue;
        color: #fff;
        cursor: pointer;
        }

        .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
        }

        .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
        }

        /*when hovering an item:*/
        .autocomplete-items div:hover {
        background-color: #e9e9e9;
        }

        /*when navigating through the items using the arrow keys:*/
        .autocomplete-active {
        background-color: DodgerBlue !important;
        color: #ffffff;
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
                    <form autocomplete="off"  action="{{route('reg.store')}}" method="POST">

                        @csrf
                        <div class="containerF">
                          <h1 class="text-center">Registration form</h1>
                          <h4>Please fill in this form to join with us.</h4>
                          <hr>
                          <label for="level"><b>What You Wish To Do?</b></label>
                          <select id="level" name="level">
                            <option value="Certificate Course">Certificate Course</option>
                            <option value="Diploma">Diploma Course</option>
                            <option value="Under Graduate">Under Graduate Degree</option>
                            <option value="Master's degree">Master's Degree</option>
                            <option value="Doctoral degree">Doctoral Degree</option>

                          </select>
                          <label for="title"><b>Title</b></label>
                          <select id="title" name="title">
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Dr.">Dr.</option>
                            <option value="Miss.">Miss.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Mx.">Mx.</option>
                            <option value="Sir.">Sir.</option>
                          </select>

                          <label for="name"><b>Full Name</b></label>
                          <input type="text" placeholder="Enter your full name" name="name" required>

                          <label for="email"><b>Email</b></label>
                          <input type="text" placeholder="Enter valid Email" name="email" required>

                          <label for="age"><b>Your Age</b></label>
                          <input type="text" placeholder="Enter your age" name="age" required>

                          <label for="level"><b>Your Country</b></label>
                          <div class="autocomplete" style="width:300px;">
                            <input id="myInput" type="text" name="myCountry" placeholder="Country">
                          </div>
                          <hr>


                          <button type="submit" class="registerbtn">Register</button>
                        </div>

                        <div class="container signin">
                        <p>Already have an account? <a href="{{route('login')}}">Sign in</a>.</p>
                        </div>
                      </form>
                </div>
                <!-- End Google Map -->


            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function autocomplete(inp, arr) {
      /*the autocomplete function takes two arguments,
      the text field element and an array of possible autocompleted values:*/
      var currentFocus;
      /*execute a function when someone writes in the text field:*/
      inp.addEventListener("input", function(e) {
          var a, b, i, val = this.value;
          /*close any already open lists of autocompleted values*/
          closeAllLists();
          if (!val) { return false;}
          currentFocus = -1;
          /*create a DIV element that will contain the items (values):*/
          a = document.createElement("DIV");
          a.setAttribute("id", this.id + "autocomplete-list");
          a.setAttribute("class", "autocomplete-items");
          /*append the DIV element as a child of the autocomplete container:*/
          this.parentNode.appendChild(a);
          /*for each item in the array...*/
          for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
              /*create a DIV element for each matching element:*/
              b = document.createElement("DIV");
              /*make the matching letters bold:*/
              b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
              b.innerHTML += arr[i].substr(val.length);
              /*insert a input field that will hold the current array item's value:*/
              b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
              /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
                  /*insert the value for the autocomplete text field:*/
                  inp.value = this.getElementsByTagName("input")[0].value;
                  /*close the list of autocompleted values,
                  (or any other open lists of autocompleted values:*/
                  closeAllLists();
              });
              a.appendChild(b);
            }
          }
      });
      /*execute a function presses a key on the keyboard:*/
      inp.addEventListener("keydown", function(e) {
          var x = document.getElementById(this.id + "autocomplete-list");
          if (x) x = x.getElementsByTagName("div");
          if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
              /*and simulate a click on the "active" item:*/
              if (x) x[currentFocus].click();
            }
          }
      });
      function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
      }
      function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
          x[i].classList.remove("autocomplete-active");
        }
      }
      function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
          if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
          }
        }
      }
      /*execute a function when someone clicks in the document:*/
      document.addEventListener("click", function (e) {
          closeAllLists(e.target);
      });
    }

    /*An array containing all the country names in the world:*/
    var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("myInput"), countries);
</script>
@endsection
