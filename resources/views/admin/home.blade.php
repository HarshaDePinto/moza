
@extends('layouts.my')

@if (Auth::user()->role_id==1)

@section('content')
 <!-- Counts Section -->
    <section class="dashboard-counts section-padding">
        <div class="container-fluid">
            <div class="row">

                <!-- Applicants-->
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="wrapper count-title d-flex">
                        <div class="icon">
                            <i class="fa fa-users" style="color:#208000"></i>
                        </div>
                        <div class="name">
                            <strong class="text-uppercase">
                                <a class="text-success" href="{{route('applicant.index')}}">Applicants
                                </a>
                            </strong>
                            <div class="count-number">
                                {{$applicants->count()}}
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Companies-->
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="wrapper count-title d-flex">
                        <div class="icon">
                            <i class="fa fa-building" style="color:#995c00"></i>
                        </div>
                        <div class="name">
                            <strong class="text-uppercase">
                                <a class="text-success" href="{{route('company.index')}}">Companies
                                </a>
                            </strong>
                            <div class="count-number">
                                {{$companies->count()}}
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Categories-->
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="wrapper count-title d-flex">
                        <div class="icon">
                            <i class="icon-check" style="color:#ff9933"></i>
                        </div>
                        <div class="name">
                            <strong class="text-uppercase">
                                <a class="text-success" href="{{route('category.index')}}">Categories
                                </a>
                            </strong>
                            <div class="count-number">
                                {{$categories->count()}}
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Vacancies-->
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="wrapper count-title d-flex">
                        <div class="icon">
                            <i class="fa fa-newspaper-o" style="color:#ff4000" ></i>
                        </div>
                        <div class="name">
                            <strong class="text-uppercase">
                                <a class="text-success" href="{{route('vacancy.index')}}">Vacancies
                                </a>
                            </strong>
                            <div class="count-number">
                                {{$vacancies->count()}}
                             </div>
                        </div>
                    </div>
                </div>

                <!-- Interviews-->
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="wrapper count-title d-flex">
                        <div class="icon">
                            <i class="fa fa-handshake-o" style="color:#999900"></i>
                        </div>
                        <div class="name">
                            <strong class="text-uppercase">
                                <a class="text-success" href="{{route('interview.index')}}">Interviews
                                </a>
                            </strong>
                            <div class="count-number">
                                {{$interviews->count()}}
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        </div>
    </section>


<!-- Header Section-->
    <section class="dashboard-header section-padding">
        <div class="container-fluid">
            <div class="row d-flex align-items-md-stretch">

                <!-- Applicants-->
                <div class="col-lg-3 col-md-6">
                    <div class="card project-progress">
                        <h2 class="display h4">Latest Applicants</h2>
                        <ul class="list-unstyled">
                            @foreach ($applicants->take(5) as $applicant)
                        <li><a href="{{route('applicant.show',$applicant->id)}}"> @if ($applicant->image)
                            <img class="rounded-circle mr-2" width="30" src="{{ asset('storage/app/public/'.$applicant->image) }}" alt="No Image" >
                            @else
                            <img class="rounded-circle mr-2" width="30" src="{{ asset('public/img/no.png') }}" alt="No Image">
                            @endif
                            {{$applicant->name}}</a></li>
                            @endforeach

                        </ul>
                        <div class="raw bg-light">
                        <a href="{{route('applicant.create')}}"><i class="fa fa-plus-circle" style="font-size:28px;color:green"></i></a>
                            <a class="float-right" href="{{route('applicant.index')}}"><i class="fa fa-caret-square-o-right" style="font-size:28px;color:blue"></i></a>
                        </div>



                    </div>
                </div>

                <!-- Companies-->
                <div class="col-lg-3 col-md-6">
                    <div class="card project-progress">
                        <h2 class="display h4">Latest Companies</h2>
                        <ul class="list-unstyled">
                            @foreach ($companies->take(6) as $company)
                        <li><a href="{{route('company.show',$company->id)}}">
                            {{$company->name}}</a></li>
                            @endforeach

                        </ul>
                        <div class="raw bg-light">
                        <a href="{{route('company.create')}}"><i class="fa fa-plus-circle" style="font-size:28px;color:green"></i></a>
                            <a class="float-right" href="{{route('company.index')}}"><i class="fa fa-caret-square-o-right" style="font-size:28px;color:blue"></i></a>
                        </div>



                    </div>
                </div>

                 <!-- Interviews-->
                <div class="col-lg-3 col-md-6">
                    <div class="card project-progress">
                        <h2 class="display h4">Latest Interviewer</h2>
                        <ul class="list-unstyled">
                            @foreach ($interviews->take(5) as $interview)
                        <li><a href="{{route('interview.show',$interview->id)}}"> @if ($interview->applicant->image)
                            <img class="rounded-circle mr-2" width="30" src="{{ asset('storage/app/public/'.$interview->applicant->image) }}" alt="No Image">
                            @else
                            <img class="rounded-circle mr-2" width="30" src="{{ asset('public/img/no.png') }}" alt="No Image">
                            @endif
                            {{$interview->applicant->name}}</a></li>
                            @endforeach

                        </ul>
                        <div class="raw bg-light">
                        <a href="{{route('interview.create')}}"><i class="fa fa-plus-circle" style="font-size:28px;color:green"></i></a>
                            <a class="float-right" href="{{route('interview.index')}}"><i class="fa fa-caret-square-o-right" style="font-size:28px;color:blue"></i></a>
                        </div>



                    </div>
                </div>
                  <!-- Vacancies-->
                <div class="col-lg-3 col-md-6">
                    <div class="card project-progress">
                        <h2 class="display h4">Latest Vacancies</h2>
                        <ul class="list-unstyled">
                            @foreach ($vacancies->take(6) as $vacancy)
                        <li><a href="{{route('vacancy.show',$vacancy->id)}}">
                            @if ($vacancy->title)
                            {{$vacancy->title->name}}
                            @else
                                Not Set Yet
                            @endif
                            </a></li>
                            @endforeach

                        </ul>
                        <div class="raw bg-light">
                        <a href="{{route('vacancy.create')}}"><i class="fa fa-plus-circle" style="font-size:28px;color:green"></i></a>
                            <a class="float-right" href="{{route('vacancy.index')}}"><i class="fa fa-caret-square-o-right" style="font-size:28px;color:blue"></i></a>
                        </div>



                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- Statistics Section Optional-->
    <section class="statistics">
        <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-lg-4">
            <!-- Income-->
            <div class="card income text-center">
                <div class="icon"><i class="icon-line-chart"></i></div>
                <div class="number">126,418</div><strong class="text-primary">All Income</strong>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do.</p>
            </div>
            </div>
            <div class="col-lg-4">
            <!-- Monthly Usage-->
            <div class="card data-usage">
                <h2 class="display h4">Monthly Usage</h2>
                <div class="row d-flex align-items-center">
                <div class="col-sm-6">
                    <div id="progress-circle" class="d-flex align-items-center justify-content-center"></div>
                </div>
                <div class="col-sm-6"><strong class="text-primary">80.56 Gb</strong><small>Current Plan</small><span>100
                    Gb Monthly</span></div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
            </div>
            </div>
            <div class="col-lg-4">
            <!-- User Actibity-->
            <div class="card user-activity">
                <h2 class="display h4">User Activity</h2>
                <div class="number">210</div>
                <h3 class="h4 display">Social Users</h3>
                <div class="progress">
                <div role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                    class="progress-bar progress-bar bg-primary"></div>
                </div>
                <div class="page-statistics d-flex justify-content-between">
                <div class="page-statistics-left"><span>Pages Visits</span><strong>230</strong></div>
                <div class="page-statistics-right"><span>New Visits</span><strong>73.4%</strong></div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>



@endsection

@section('mail')
    <!-- Messages dropdown-->
    <li class="nav-item dropdown">
        <a id="messages" rel="nofollow" data-target="#" href="#"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
            <i class="fa fa-envelope" style="font-size:20px;color:white" ></i>
            <span class="badge badge-info">
                {{$mails->count()}}
            </span>
        </a>

            <ul aria-labelledby="notifications" class="dropdown-menu">
                @foreach ($mails->take(5) as $mail)
                    <li>
                        <a rel="nofollow" href="{{route('applicant.show',$mail->applicant->id)}}" class="dropdown-item d-flex">
                            <div class="msg-profile">
                                @if ($mail->applicant->image)
                                    <img class="rounded-circle mr-2" width="50" src="{{ asset('storage/app/public/'.$mail->applicant->image) }}" alt="No Image">
                                @else
                                    <img class="rounded-circle mr-2" width="50" src="{{ asset('public/img/no.png') }}" alt="No Image">
                                @endif

                            </div>
                            <div class="msg-body">
                                <h3 class="h5">
                                    {{$mail->applicant->name}}
                                </h3>
                                <span>
                                    {{$mail->subject}}
                                </span>
                                <small>
                                    {{$mail->updated_at->diffForHumans()}}
                                </small>
                            </div>
                        </a>
                    </li>
                @endforeach

                <div class="raw bg-light">

                    <a class="float-right" href="{{route('applicant.index')}}">
                        <i class="fa fa-caret-square-o-right" style="font-size:28px;color:blue"></i>
                    </a>
                </div>
            </ul>
    </li>
@endsection

@section('users')
    <!-- Messages dropdown-->
    <li class="nav-item dropdown">
        <a id="messages" rel="nofollow" data-target="#" href="#"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
            <i class="fa fa-users" style="font-size:20px;color:white" ></i>
            <span class="badge badge-info">
                {{$users->where('log',1)->count()}}
            </span>
        </a>

            <ul aria-labelledby="notifications" class="dropdown-menu">
                @foreach ($users->where('log',1)->take(10) as $user)
                    <li>
                        <a rel="nofollow" href="" class="dropdown-item d-flex">
                            <div class="msg-profile">
                                @if ($user->image)
                                    <img class="rounded-circle mr-2" width="40" src="{{ asset('storage/app/public/'.$user->image) }}" alt="No Image">
                                @else
                                    <img class="rounded-circle mr-2" width="50" src="{{ asset('public/img/no.png') }}" alt="No Image">
                                @endif

                            </div>
                            <div class="msg-body">
                                <h3 class="h5">
                                    {{$user->name}}
                                </h3>
                                <span>
                                    {{$user->role->name}}
                                </span>
                                <small>
                                    <span class="text-primary">Online</span>
                                </small>
                            </div>
                        </a>
                    </li>
                @endforeach

                <div class="raw bg-light">

                    <a class="float-right" href="{{route('applicant.index')}}">
                        <i class="fa fa-caret-square-o-right" style="font-size:28px;color:blue"></i>
                    </a>
                </div>
            </ul>
    </li>
@endsection


@endif

