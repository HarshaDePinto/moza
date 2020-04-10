@extends('layouts.my')



@section('styles')
    {{-- For Sub Nav --}}
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

        #Category {background-color: rgb(0 0 0 0.8);}
        #Ref {background-color: rgb(0 0 0 0.8);}
        #Status {background-color: rgb(0 0 0 0.8);}
        #Education {background-color: rgb(0 0 0 0.8);}
    </style>

@endsection


@section('content')

<section>
    <div class="container-fluid">
      <!-- Page Header-->
        <button class="tablink" onclick="openPage('Category', this, '#ff9933')">By Category</button>
        <button class="tablink" onclick="openPage('Ref', this, '#33ccff')" >By Ref. Number</button>
        <button class="tablink" onclick="openPage('Status', this, '#009900')">Status</button>
        <button class="tablink" onclick="openPage('Education', this, '#cc6600')">Education</button>

      <div id="Category" class="tabcontent">
        <h3>Select Category</h3>
        <form class="form-horizontal" action="{{route('apCategory')}}" method="POST" enctype="multipart/form-data">
            @csrf

            @foreach ($categories as $category)
                <div class="i-checks">
                    <input id="{{$category->id}}" type="radio" value="{{$category->id}}" name="category_id" class="form-control-custom radio-custom" required>
                    <label for="{{$category->id}}">
                        <h2>{{$category->name}}</h2>
                    </label>
                </div>

            @endforeach


            <button type="submit" class="float-right btn btn-primary ">
                <i class="fa fa-search" style="font-size:48px"></i>
            </button>
        </form>
      </div>

      <div id="Ref" class="tabcontent">
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

      <div id="Status" class="tabcontent">
        <h3>Status</h3>
        <button style="background-color:#00bfff ;" class="btn   text-white" onclick="show('operation1')"><i class="fas fa-user-tie"></i> Processing</button>
        <button style="background-color:#ff8000 ;" class="btn   text-white" onclick="show('operation2')"><i class="fas fa-user-tie"></i> Contacted</button>
        <button style="background-color:#0099ff ;" class="btn   text-white" onclick="show('operation3')"><i class="fas fa-user-tie"></i> Hired</button>

        <button style="background-color:#cc6600 ;" class="btn   text-white" onclick="show('operation4')"><i class="fas fa-user-tie"></i> Rejected</button>
      </div>

      <div id="Education" class="tabcontent">
        <button style="background-color:#cc6600 ;" class="btn   text-white" onclick="show('operation5')"><i class="fas fa-user-tie"></i> Level 1</button>
        <button style="background-color:#0066ff ;" class="btn   text-white" onclick="show('operation6')"><i class="fas fa-user-tie"></i> Level 2</button>
        <button style="background-color:#cc6600 ;" class="btn   text-white" onclick="show('operation7')"><i class="fas fa-user-tie"></i> Level 3</button>

        <button style="background-color:#0066ff ;" class="btn   text-white" onclick="show('operation8')"><i class="fas fa-user-tie"></i> Level 4</button>
        <button style="background-color:#cc6600 ;" class="btn   text-white" onclick="show('operation9')"><i class="fas fa-user-tie"></i> Level 5</button>
      </div>

      <div class="row">

        <div class="col-lg-12">
            <div id="main_place">
                <div class="card">
                    <div class="card-header">
                    <h4>All Applicants</h4>
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



                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>

      </div>
    </div>
</section>


  <div id="operation1" style="display:none">
    <div class="card">
        <div class="card-header">
        <h4>Still Processing </h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>Ref:</th>
                <th>Name</th>
                <th>Status</th>
                <th>Job Title</th>
                <th>Experiance</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                @if ($applicant->sn==0)


                <tr>
                    <th>{{$applicant->regNumber}}</th>
                    <th><a href="{{route('applicant.show',$applicant->id)}}">
                        @if ($applicant->image)
                        <img class="rounded-circle mr-2" width="50" src="{{ asset('storage/app/public/'.$applicant->image) }}" alt="why">
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

                    <th>
                        {{$applicant->experience}} Months

                    </th>
                </tr>

                @endif
                @endforeach



            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

<div id="operation2" style="display:none">
    <div class="card">
        <div class="card-header">
        <h4>Contacted By Mails</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>Ref:</th>
                <th>Name</th>
                <th>Status</th>
                <th>Job Title</th>
                <th>Experiance</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                @if ($applicant->sn==1 )


                <tr>
                    <th>{{$applicant->regNumber}}</th>
                    <th><a href="{{route('applicant.show',$applicant->id)}}">
                        @if ($applicant->image)
                        <img class="rounded-circle mr-2" width="50" src="{{ asset('storage/app/public/'.$applicant->image) }}" alt="why">
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

                    <th>
                        {{$applicant->experience}} Months

                    </th>
                </tr>

                @endif
                @endforeach



            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

<div id="operation3" style="display:none">
    <div class="card">
        <div class="card-header">
        <h4>Hired</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>Ref:</th>
                <th>Name</th>
                <th>Status</th>
                <th>Job Title</th>
                <th>Experiance</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                @if ($applicant->sn==2 )


                <tr>
                    <th>{{$applicant->regNumber}}</th>
                    <th><a href="{{route('applicant.show',$applicant->id)}}">
                        @if ($applicant->image)
                        <img class="rounded-circle mr-2" width="50" src="{{ asset('storage/app/public/'.$applicant->image) }}" alt="why">
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

                    <th>
                        {{$applicant->experience}} Months

                    </th>
                </tr>

                @endif
                @endforeach



            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

<div id="operation4" style="display:none">
    <div class="card">
        <div class="card-header">
        <h4>Rejected</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>Ref:</th>
                <th>Name</th>
                <th>Status</th>
                <th>Job Title</th>
                <th>Experiance</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                @if ($applicant->sn==3)


                <tr>
                    <th>{{$applicant->regNumber}}</th>
                    <th><a href="{{route('applicant.show',$applicant->id)}}">
                        @if ($applicant->image)
                        <img class="rounded-circle mr-2" width="50" src="{{ asset('storage/app/public/'.$applicant->image) }}" alt="why">
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

                    <th>
                        {{$applicant->experience}} Months

                    </th>
                </tr>

                @endif
                @endforeach



            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

<div id="operation5" style="display:none">
    <div class="card">
        <div class="card-header">
        <h4>Applicants Level 1</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>Reg.</th>
                <th>Name</th>
                <th>Status</th>
                <th>Job Title</th>
                <th>Education</th>
                <th>Experiance</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                @if ($applicant->eduLevel==1)


                <tr>
                    <th>{{$applicant->regNumber}}</th>
                    <th><a href="{{route('applicant.show',$applicant->id)}}">
                        @if ($applicant->image)
                        <img class="rounded-circle mr-2" width="50" src="{{ asset('storage/app/public/'.$applicant->image) }}" alt="why">
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
                    <th>Level-{{$applicant->eduLevel}}</th>
                    <th>
                        {{$applicant->experience}} Months

                    </th>
                </tr>

                @endif
                @endforeach



            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<div id="operation6" style="display:none">
    <div class="card">
        <div class="card-header">
        <h4>Applicants Level 2</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>Reg.</th>
                <th>Name</th>
                <th>Status</th>
                <th>Job Title</th>
                <th>Education</th>
                <th>Experiance</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                @if ($applicant->eduLevel==2)


                <tr>
                    <th>{{$applicant->regNumber}}</th>
                    <th><a href="{{route('applicant.show',$applicant->id)}}">
                        @if ($applicant->image)
                        <img class="rounded-circle mr-2" width="50" src="{{ asset('storage/app/public/'.$applicant->image) }}" alt="why">
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
                    <th>Level-{{$applicant->eduLevel}}</th>
                    <th>
                        {{$applicant->experience}} Months

                    </th>
                </tr>

                @endif
                @endforeach



            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

<div id="operation7" style="display:none">
    <div class="card">
        <div class="card-header">
        <h4>Applicants Level 3</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>Reg.</th>
                <th>Name</th>
                <th>Status</th>
                <th>Job Title</th>
                <th>Education</th>
                <th>Experiance</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                @if ($applicant->eduLevel==3)


                <tr>
                    <th>{{$applicant->regNumber}}</th>
                    <th><a href="{{route('applicant.show',$applicant->id)}}">
                        @if ($applicant->image)
                        <img class="rounded-circle mr-2" width="50" src="{{ asset('storage/app/public/'.$applicant->image) }}" alt="why">
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
                    <th>Level-{{$applicant->eduLevel}}</th>
                    <th>
                        {{$applicant->experience}} Months

                    </th>
                </tr>

                @endif
                @endforeach



            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

<div id="operation8" style="display:none">
    <div class="card">
        <div class="card-header">
        <h4>Applicants Level 4</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>Reg.</th>
                <th>Name</th>
                <th>Status</th>
                <th>Job Title</th>
                <th>Education</th>
                <th>Experiance</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                @if ($applicant->eduLevel==4)


                <tr>
                    <th>{{$applicant->regNumber}}</th>
                    <th><a href="{{route('applicant.show',$applicant->id)}}">
                        @if ($applicant->image)
                        <img class="rounded-circle mr-2" width="50" src="{{ asset('storage/app/public/'.$applicant->image) }}" alt="why">
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
                    <th>Level-{{$applicant->eduLevel}}</th>
                    <th>
                        {{$applicant->experience}} Months

                    </th>
                </tr>

                @endif
                @endforeach



            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

<div id="operation9" style="display:none">
    <div class="card">
        <div class="card-header">
        <h4>Applicants Level 5</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>Reg.</th>
                <th>Name</th>
                <th>Status</th>
                <th>Job Title</th>
                <th>Education</th>
                <th>Experiance</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                @if ($applicant->eduLevel==5)


                <tr>
                    <th>{{$applicant->regNumber}}</th>
                    <th><a href="{{route('applicant.show',$applicant->id)}}">
                        @if ($applicant->image)
                        <img class="rounded-circle mr-2" width="50" src="{{ asset('storage/app/public/'.$applicant->image) }}" alt="why">
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
                    <th>Level-{{$applicant->eduLevel}}</th>
                    <th>
                        {{$applicant->experience}} Months

                    </th>
                </tr>

                @endif
                @endforeach



            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
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

<script>
    function show(param_div_id) {
    document.getElementById('main_place').innerHTML = document.getElementById(param_div_id).innerHTML;
    }
</script>
@endsection

