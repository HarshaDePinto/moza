@extends('layouts.my')



@section('styles')

<style>
    /* Style tab links */
    .tablink {
      background-color: #555;
      color: white;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      font-size: 17px;
      width: 25%;
    }

    .tablink:hover {
      background-color: #777;
    }

    /* Style the tab content (and add height:100% for full page content) */
    .tabcontent {
      color: black;
      display: none;
      padding: 100px 20px;
      height: 50%;
    }

    #Home {background-color: rgb(0 0 0 0.8);}
    #News {background-color: rgb(0 0 0 0.8);}
    #Contact {background-color: rgb(0 0 0 0.8);}
    #About {background-color: rgb(0 0 0 0.8);}
    </style>

@endsection

@section('content')

<section>
    <div class="container-fluid">
      <!-- Page Header-->
      <button class="tablink" onclick="openPage('Home', this, '#1c1b1b')">By Category</button>
      <button class="tablink" onclick="openPage('News', this, '#1c1b1b')" >By Ref. Number</button>


      <div id="Home" class="tabcontent">
        <h3>Select Category</h3>
      <form class="form-horizontal" action="{{route('apCategory')}}" method="POST" enctype="multipart/form-data">
            @csrf

            @foreach ($categories as $category)
            <div class="i-checks">
                <input id="{{$category->id}}" type="radio" value="{{$category->id}}" name="category_id" class="form-control-custom radio-custom" required>
                <label for="{{$category->id}}"><h2>{{$category->name}}</h2></label>
            </div>

            @endforeach


            <button type="submit" class="float-right btn btn-primary "> <i class="fa fa-search" style="font-size:48px"></i></button>
        </form>
      </div>

      <div id="News" class="tabcontent">
        <h3>Enter The Ref. Number </h3>
        <form class="form-horizontal" action="{{route('apRef')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label class="col-sm-2 form-control-label" for="regNumber">Ref. Number</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="regNumber" required >
                </div>
              </div>


            <button type="submit" class="float-right btn btn-primary "> <i class="fa fa-search" style="font-size:48px"></i></button>
        </form>
      </div>

      <div id="Contact" class="tabcontent">
        <h3>Contact</h3>
        <p>Get in touch, or swing by for a cup of coffee.</p>
      </div>

      <div id="About" class="tabcontent">
        <h3>About</h3>
        <p>Who we are and what we do.</p>
      </div>

      <div class="row">

        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Search Result</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Ref.</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Job Title</th>
                      <th>Updated By</th>

                    </tr>
                  </thead>
                  <tbody>
                      @if ($applicants->count()>0)


                      @foreach ($applicants as $applicant)
                      <tr>
                          <th>
                              {{$applicant->regNumber}}
                          </th>
                        <th><a href="{{route('applicant.show',$applicant->id)}}">
                            @if ($applicant->image)
                            <img class="rounded-circle mr-2" width="50" src="{{ asset('storage/app/public/'.$applicant->image) }}" alt="No Image">
                            @else
                            <img class="rounded-circle mr-2" width="50" src="{{ asset('public/img/no.png') }}" alt="No Image">
                            @endif
                            {{$applicant->name}}
                        </a>
                        </th>
                        <td>{{$applicant->status}}</td>
                        <td>
                            @if ($applicant->title)
                            {{$applicant->title->name}}
                            @else
                                Not Set Yet
                            @endif
                        </td>

                        <td>
                            {{$applicant->author}}<br>
                            {{$applicant->updated_at->diffForHumans()}}
                        </td>
                      </tr>
                      @endforeach
                      @else
                      <h1 class="text-danger text-center">{{'No Applicants Found, Plese Check The Ref. Number!!!!!'}}</h1>

                      @endif


                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection

@section('scripts')
<script>
    function openPage(pageName,elmnt,color) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
      }
      document.getElementById(pageName).style.display = "block";
      elmnt.style.backgroundColor = color;
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>
@endsection

