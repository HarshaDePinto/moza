
@extends('layouts.my')

@section('content')
 <!-- Counts Section -->



<!-- Header Section-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="{{route('vacancy.index')}}"><i class="fa fa-caret-square-o-left" style="font-size:20px"></i></a>
    <a class="navbar-brand" href="#top">Top</a>

    <a class="navbar-brand" href="#Vacancies">Qualification</a>
    <a class="navbar-brand" href="#Interviews">Benifits</a>


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

                    <h2 class="display h4">
                        @if ($vacancy->title)
                        {{$vacancy->title->name}}
                        @else
                            Not Set Yet
                        @endif
                         <a href="{{route('vacancy.edit',$vacancy->id)}}"> <i class="fa fa-edit" style="font-size:24px"></i></a></h2>

                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center">

                                <label for="list-1">
                                    Published on: <span class="text-info">{{$vacancy->start}}</span></label>
                            </li>

                            <li class="d-flex align-items-center mt-3">

                                <label for="list-1">Vacancy: <span class="text-info">{{$vacancy->number}}</span></label>


                            </li>
                            <li class="d-flex align-items-center mt-3">

                                <label for="list-1">Employment Status: <span class="text-info">{{$vacancy->time}}</span></label>


                            </li>

                            <li class="d-flex align-items-center mt-3">

                                <label for="list-1">Salary: <span class="text-info">{{$vacancy->salary}}</span></label>


                            </li>

                            <li class="d-flex align-items-center mt-3">

                                <label for="list-1">Gender: <span class="text-info">{{$vacancy->gender}}</span></label>


                            </li>

                            <li class="d-flex align-items-center mt-3">

                                <label for="list-1">Application Deadline: <span class="text-info">{{$vacancy->end}}</span></label>


                            </li>


                        </ul>
                    </div>
                </div>

            <!-- Profile-->
            <div class="col-lg-4 col-md-6">
            <div class="card project-progress">
                <h3 class="display h4">Job Description</h3>
                <p>{!!$vacancy->des!!}</p>


            </div>
            </div>
            <!-- Work History-->
            <div class="col-lg-5 col-md-12 flex-lg-last flex-md-first align-self-baseline">
            <div class="card sales-report">

            </div>
            </div>
        </div>
        </div>
    </section>








<!-- Statistics Section-->




@endsection
