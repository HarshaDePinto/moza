@extends('layouts.adStudent')

@section('styles')

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

    {{-- Trix Editor --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">

@endsection

@section('content')
    {{-- Search --}}
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-flex align-items-center">
            <h4><a class="navbar-brand" href="{{route('stuLev.index')}}"><i class="fa fa-caret-square-o-left" style="font-size:20px"></i></a> <i class="icon-check"></i> Find An Educational Level <a class="navbar-brand" href="#addLevel"><i class="mx-4 fa fa-plus-circle" style="font-size:20px;color:green"></i></a></h4>
            </div>
            <div class="card-body">

                <form autocomplete="off" action="{{route('stLevName')}}" method="POST">
                    @csrf
                      <div class="autocomplete" style="width:300px;">
                        <input id="myInput" type="text" name="name" placeholder="Educational Level">
                      </div>
                      <button type="submit" class="mr-3 btn btn-primary"> <i class="fa fa-search" style="font-size:48px"></i></button>
                  </form>
            </div>
        </div>
    </div>



    <div class="container-fluid">
        <!-- Page Header-->

        <div class="row">

          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>Levels of the NZQF</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Level</th>
                        <th>Subjects</th>
                        <th>Cources</th>
                        <th>Students</th>
                        <th>Colleges</th>
                        <th>Updated By</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($levels as $level)
                        <tr>
                          <th>
                          <a href="{{route('stuLev.show',$level->id)}}">{{$level->name}}</a>

                          </th>
                          <th>

                                  {{$level->subjects->count()}}


                          </th>
                          <td>12</td>
                          <td>12</td>
                          <td>12</td>
                          <td>
                            {{$level->updated_at->diffForHumans()}}<br> {{$level->author}}
                          </td>
                        </tr>
                        @endforeach



                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>

    <div id="addLevel" class="container-fluid">

        <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4> <i class="icon-check"></i> Add Levels of the NZQF</h4>
            </div>
            <div class="card-body">
              <form class="form-horizontal" action="{{route('stuLev.store')}}" method="POST">
                @csrf



                <div class="form-group">
                  <label for="name" >NZQF Level</label>
                  <input id="name" name="name" type="text"  class="mr-3 form-control" required>
                </div>
                <div class="form-group">
                    <label for="des" >Description</label>
                    <input id="des" type="hidden" name="des">
                                    <trix-editor input="des"></trix-editor>

                </div>
                <input id="author" name="author" type="text"  value="{{ Auth::user()->name}}" hidden>
                <div class="form-group">
                  <input type="submit" value="Add" class="mr-3 btn btn-primary">
                </div>
              </form>
            </div>
          </div>
    </div>

@endsection

@section('scripts')

    {{-- Trix Editor --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>

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
        var companies = {!! $kl !!};

        /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
        autocomplete(document.getElementById("myInput"), companies);
    </script>


@endsection
