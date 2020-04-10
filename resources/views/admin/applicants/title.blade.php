
@extends('layouts.my')

@section('content')
 <!-- Counts Section -->



<!-- Header Section-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="{{route('applicant.index')}}"><i class="fa fa-caret-square-o-left" style="font-size:20px"></i></a>
    <a class="navbar-brand" href="#top">Top</a>

    <a class="navbar-brand" href="#qualification">Qualification</a>
    <a class="navbar-brand" href="#experience">Experience</a>
    <a class="navbar-brand" href="#cv">CV</a>
    <a class="navbar-brand" href="#cl">CL</a>
    <a class="navbar-brand" href="#ot">OD</a>
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

                    <h2 class="display h4">{{$applicant->name}} <a href="{{route('applicant.edit',$applicant->id)}}"> <i class="fa fa-edit" style="font-size:24px"></i></a></h2>
                        <img src="{{asset("storage/app/public/$applicant->image")}}" style="width:100%"></a>
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center mt-3">

                                <label for="list-1">From: <span class="text-info">{{$applicant->country}}</span></label>


                            </li>

                            <li class="d-flex align-items-center">

                                <label for="list-1">
                                    Email: <span class="text-info">{{$applicant->email}}</span></label>
                            </li>

                            <li class="d-flex align-items-center">
                                <label for="list-1"> Tel: </label>

                                <label for="list-1"> <span class="text-info">{!!$applicant->tel!!}</span></label>
                            </li>

                        </ul>
                    </div>
                </div>

            <!-- Profile-->
            <div class="col-lg-4 col-md-6">
            <div class="card project-progress">
                <h3 class="display h4">Applicant Status <span class="text-info">{{$applicant->status}}</span></h3>


                <br>
                <h3 class="display h4">Job Category <span class="text-info">
                    @if ($applicant->category)
                    {{$applicant->category->name}}

                    @else
                        Not Selected
                    @endif
                    </span>
                </h3>
                <br>
                <h3 class="display h4">Job Title <span class="text-info">
                    @if ($applicant->title)
                    {{$applicant->title->name}}

                    @else
                        Not Selected
                    @endif
                    </span>
                </h3>

                <br>

                <h3 class="display h4">Is currently employed? <span class="text-info">{{$applicant->profile}}</span></h3>
                <br>
                <h3 class="display h4"> <span class="text-info">{{$applicant->experience}}</span> months Work experiences.</h3>
                <br>
                <h3 class="display h4">Currently Worked As <span class="text-info">{{$applicant->c_job}}</span> <br> At <span class="text-info">{{$applicant->c_company}}</span> </h3>



            </div>
            </div>
            <!-- Work History-->
            <div class="col-lg-5 col-md-12 flex-lg-last flex-md-first align-self-baseline">
            <div class="card sales-report">
                <h3 class="display h4">Job Category <span class="text-info">{{$applicant->category->name}}</span> <a href="{{route('makeCategory',$applicant->id)}} " class="btn btn-info btn-sm mr-2 d-inline">change</a></h3>

                <h3 class="display h4">Select Job Title </h3>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('makeTitle',$applicant->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @foreach ($titles as $title)
                        <div class="i-checks">
                            <input id="{{$title->id}}" type="radio" value="{{$title->id}}" name="title_id" class="form-control-custom radio-custom">
                            <label for="{{$title->id}}"><h2>{{$title->name}}</h2></label>
                        </div>

                        @endforeach

                        <input id="author" type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" hidden>

                        <button type="submit" class="float-right btn btn-primary ">Set Title</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

    <section id="qualification" class="dashboard-header section-padding">

        <div class="container-fluid mt-5">
            <div class="row d-flex align-items-md-stretch">

            <!-- Education-->
                <div class="col-lg-6 col-md-6">
                    <div class="card to-do">

                    <h2 class="display h4">Educational Qualification</h2>

                    <p>{!!$applicant->education!!}</p>

                    </div>
                </div>

            <!-- technical-->
            <div class="col-lg-6 col-md-6">
            <div class="card project-progress">
                <h2 class="display h4">Technical Qualifications</h2>
                <p>{!!$applicant->technical!!}</p>



            </div>
            </div>

        </div>
        </div>
    </section>

    <section id="experience" class="dashboard-header section-padding">

        <div class="container-fluid mt-5">
            <div class="row d-flex align-items-md-stretch">

            <!-- Education-->
                <div class="col-lg-6 col-md-6">
                    <div class="card to-do">

                    <h2 class="display h4">Current Job Description</h2>

                    <p>{!!$applicant->c_jd!!}</p>

                    </div>
                </div>

            <!-- technical-->
            <div class="col-lg-6 col-md-6">
            <div class="card project-progress">
                <h2 class="display h4">Work History</h2>
                <p>{!!$applicant->history!!}</p>



            </div>
            </div>

        </div>
        </div>
    </section>

    <section id="cv" class="dashboard-header section-padding">
        <div class="container-fluid mt-5">
            <div class="row d-flex align-items-md-stretch">

            <!-- Applicant Cv -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
            <div class="card sales-report">
                <h2 class="display h4">Curriculum Vitae</h2>
                <div class="embed-responsive embed-responsive-16by9">
                <iframe src="{{asset("storage/app/public/$applicant->cv")}}" frameborder="0" class="embed-responsive-item"></iframe>
            </div>
            </div>
            </div>
        </div>
        </div>
    </section>

    <section id="cl" class="dashboard-header section-padding">
        <div class="container-fluid mt-5">
            <div class="row d-flex align-items-md-stretch">

            <!-- Applicant Cv -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
            <div class="card sales-report">
                <h2 class="display h4">Cover Letter</h2>
                <div class="embed-responsive embed-responsive-16by9">
                <iframe src="{{asset("storage/app/public/$applicant->cl")}}" frameborder="0" class="embed-responsive-item"></iframe>
            </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <section id="ot" class="dashboard-header section-padding">
        <div class="container-fluid mt-5">
            <div class="row d-flex align-items-md-stretch">

            <!-- Applicant Cv -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
            <div class="card sales-report">
                <h2 class="display h4">Other Documents</h2>
                <div class="embed-responsive embed-responsive-16by9">
                <iframe src="{{asset("storage/app/public/$applicant->ot")}}" frameborder="0" class="embed-responsive-item"></iframe>
            </div>
            </div>
            </div>
        </div>
        </div>
    </section>
<!-- Statistics Section-->




@endsection
