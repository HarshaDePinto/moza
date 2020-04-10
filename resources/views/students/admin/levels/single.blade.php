@extends('layouts.adStudent')

@section('content')
 <!-- Counts Section -->



<!-- Header Section-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <a class="navbar-brand" href="{{route('stuLev.index')}}"><i class="fa fa-caret-square-o-left" style="font-size:20px"></i></a>
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

            <!-- Description-->
                <div class="col-lg-8 col-md-8">
                    <div class="card to-do">
                        <h3>{{$level->name}}</h3>
                        <div class="container">
                            {!!$level->des!!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="card to-do">
                        <a class="btn text-white my-2" style="background-color:#FF851B;" href="">
                            Add A Subject
                        </a>
                        <a class="btn text-white my-2" style="background-color:#0040ff;" href="#Vacancies">
                            Add A Colleges
                        </a>
                        <a class="btn btn-success text-white my-2" href="">
                            Students

                        </a>
                        <a class="btn btn-danger text-white my-2" href="">
                            Cources
                        </a>
                    </div>
                </div>
            <!-- Work History-->

        </div>
        </div>
    </section>









<!-- Statistics Section-->




@endsection
