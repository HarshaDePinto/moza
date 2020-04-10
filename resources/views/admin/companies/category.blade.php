
@extends('layouts.my')

@section('content')
 <!-- Counts Section -->



<!-- Header Section-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="{{route('company.show',$company->id)}}"><i class="fa fa-caret-square-o-left" style="font-size:20px"></i></a>
    <a class="navbar-brand" href="#top">Top</a>

    <a class="navbar-brand" href="#Vacancies">Vacancies</a>
    <a class="navbar-brand" href="#Interviews">Interviews</a>
    <a class="navbar-brand" href="#Hired">Hired</a>
    <a class="navbar-brand" href="#Hired">Job titels</a>

    {{-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    </ul> --}}
  </nav>

    <section id="top" class="dashboard-header section-padding">


        <h1 class="text-primary text-center mb-4"></h1>
        <div class="container-fluid">
            <div class="row d-flex align-items-md-stretch">

            <!-- Personal-->
                <div class="col-lg-3 col-md-6">
                    <div class="card to-do">

                    <h2 class="display h4"> {{$company->name}} <a href="{{route('company.edit',$company->id)}}"> <i class="fa fa-edit" style="font-size:24px"></i></a></h2>

                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center">

                                <label for="list-1">
                                    Reg.No: <span class="text-info">{{$company->reg}}</span></label>
                            </li>

                            <li class="d-flex align-items-center mt-3">

                                <label for="list-1">Web: <span class="text-info">{{$company->web}}</span></label>


                            </li>



                            <li class="d-flex align-items-center">


                                <label for="list-1"> <span class="text-info">{!!$company->location!!}</span></label>
                            </li>

                        </ul>
                    </div>
                </div>

            <!-- Profile-->
            <div class="col-lg-4 col-md-6">
            <div class="card project-progress">
                <h3 class="display h4">Contact Person <br> <span class="text-info">{{$company->contact_person_name}}</span></h3>


                <br>
                <h3 class="display h4">Position <span class="text-info">

                    {{$company->contact_person_position}}


                    </span>
                </h3>

                <br>
                <h3 class="display h4">Email <span class="text-info">

                    {{$company->contact_person_email}}


                    </span>
                </h3>

                <br>
                <h3 class="display h4">Tel <span class="text-info">

                    {{$company->contact_person_tel}}


                    </span>
                </h3>

                <br>
                <h3 class="display h4">Note <span class="text-info">

                    {!!$company->note!!}


                    </span>
                </h3>




            </div>
            </div>
            <!-- Work History-->
            <div class="col-lg-5 col-md-12 flex-lg-last flex-md-first align-self-baseline">
            <div class="card sales-report">
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('setCCategory',$company->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @foreach ($categories as $category)
                        <div class="i-checks">
                            <input id="{{$category->id}}" type="checkbox" value="{{$category->id}}" name="categories[]" class="form-control-custom checkbox-custom"

                            @if ($company->categories)

                            @if ($company->hasCategories($category->id))
                            checked

                            @endif

                            @endif


                            >
                            <label for="{{$category->id}}"><h2>{{$category->name}}</h2></label>
                        </div>

                        @endforeach

                        <input id="author" type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" hidden>

                        <button type="submit" class="float-right btn btn-primary ">Set Category</button>
                    </form>
                </div>

            </div>
            </div>
        </div>
        </div>
    </section>








<!-- Statistics Section-->




@endsection
