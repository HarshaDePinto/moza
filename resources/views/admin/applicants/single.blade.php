
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
    <a class="navbar-brand" href="#mails">Mails</a>

</nav>

    <section id="top" class="dashboard-header section-padding">


        <h1 class="text-primary text-center mb-4"></h1>
        <div class="container-fluid">
            <div class="row d-flex align-items-md-stretch">

            <!-- Personal-->
                <div class="col-lg-3 col-md-6">
                    <div class="card to-do">

                    <h2 class="display h4"> <a href="{{route('applicant.edit',$applicant->id)}}"> {{$applicant->name}} <i class="fa fa-edit" style="font-size:24px"></i></h2>
                        <img src="{{asset("storage/app/public/$applicant->image")}}" style="width:100%"></a>
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center mt-3">

                                <label for="list-1">Ref: <span class="text-info">{{$applicant->regNumber}}</span></label>


                            </li>
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
                <h3 class="display h4">Applicant Status <span class="text-info">{{$applicant->status}}</span>
                @if ($applicant->sn!=0)
                <span class="text-primary"><a href="#mails"><i
                    class="fa fa-envelope"></i></a></span>
                @endif

                </h3>

                @if ($applicant->interviews->count()>0)
                <br><h3 class="display h4">Interviews </h3>
                <ul>
                    @foreach ($applicant->interviews as $interview)
                <li><a href="{{route('interview.show',$interview->id)}}">
                    On {{date('d-M-Y',strtotime($interview->date))}} at {{$interview->time}}
                </a>
                </li>
                    @endforeach
                </ul>


                @endif
                <br>

                <h3 class="display h4">Educaltion: <span class="text-info"> Level-{{$applicant->eduLevel}}</span></h3>
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

            @if ($applicant->sn==0 || $applicant->sn==1)
            <a class="btn text-white my-2" style="background-color:#FF851B;" href="{{route('makeCategory',$applicant->id)}}">Set A Job Title</a>
            <a class="btn text-white my-2" style="background-color:#0040ff;" href="{{route('app.interview',$applicant->id)}}">Set An Interview</a>
            <a class="btn text-white my-2" style="background-color:#0099ff;" href="{{route('mail.create',$applicant->id)}}">Send An Email</a>
            <a class="btn btn-success text-white my-2" href="{{route('app.hire',$applicant->id)}}">Hire The Applicant</a>
            <a class="btn btn-danger text-white my-2" href="{{route('app.reject',$applicant->id)}}">Reject The Aplicant</a>
            @endif



                @if ($applicant->sn==2)
                @foreach ($applicant->hires as $hire)
                <h3 class="display h4">Hired By: <span class="text-info">{{$hire->vacancy->company->name}}</span></h3>
                <h3 class="display h4">As: <span class="text-info">{{$hire->vacancy->title->name}}</span></h3>
                <h3 class="display h4">On: <span class="text-info">
                    {{date('d-M-Y',strtotime($hire->date))}}
                   </span></h3>
                   <h3 class="display h4">Note: <span class="text-info">{!!$hire->note!!}</span></h3>
                @endforeach
                <a class="btn btn-danger text-white my-2" href="{{route('app.reject',$applicant->id)}}">Reject The Aplicant</a>
                @endif



                @if ($applicant->sn==3)
                @foreach ($applicant->rejects as $reject)
                <h3 class="display h4">Rejected By: <span class="text-info">{{$reject->author}}</span></h3>
                <h3 class="display h4">On: <span class="text-info">
                    {{date('d-M-Y',strtotime($reject->date))}}
                   </span></h3>
                   <h3 class="display h4">Reason: <span class="text-info">{!!$reject->note!!}</span></h3>
                @endforeach
                <a class="btn btn-danger text-white my-2" href="{{route('applicant.destroy',$applicant->id)}}">Delete The Aplicant</a>
                @endif
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

<section id="mails" class="dashboard-header section-padding">

    @if ($applicant->mails->count()>0)
    @foreach ($applicant->mails as $mail)
    <div class="container-fluid mt-5">
        <div class="row d-flex align-items-md-stretch">

            <div class="card">
                <div class="card-header">
                <h4>{{$mail->subject}} </h4>
                </div>
                <div class="card-body">

                    {!!$mail->body!!}



                </div>

                <div class="card-footer">
                    <p>Sent By <span class="text-info">{{$mail->author}}</span><br><span class="text-primary">{{$mail->updated_at->diffForHumans()}}</span></p>

                </div>


                </div>
            </div>
    </div>
    @endforeach
    @endif

</section>


@endsection
