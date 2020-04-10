
@extends('layouts.my')

@section('content')
 <!-- Counts Section -->



<!-- Header Section-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="{{route('company.index')}}"><i class="fa fa-caret-square-o-left" style="font-size:20px"></i></a>
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
                            <li class="d-flex align-items-center mt-3">


                                <ul>
                                    <h2>Categories</h2>
                                    @foreach ($company->categories as $category)
                                <li>{{$category->name}}</li>

                                    @endforeach
                                </ul>


                            </li>

                        </ul>
                    </div>
                </div>

            <!-- Profile-->
            <div class="col-lg-4 col-md-6">
            <div class="card project-progress">
                <h3 class="display h4"><span class="text-info">{{$company->regNumber}}</span></h3>
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
            <a class="btn text-white my-2" style="background-color:#FF851B;" href="{{route('makeCCategory',$company->id)}}">Set Categories</a>
                <a class="btn text-white my-2" style="background-color:#0040ff;" href="#Vacancies">Vacancies</a>
                <a class="btn btn-success text-white my-2" href="">Interview</a>
                <a class="btn btn-danger text-white my-2" href="">Hired</a>

            </div>
            </div>
        </div>
        </div>
    </section>


    <section id="Vacancies" class="dashboard-header section-padding">
        <div class="container-fluid">
          <!-- Page Header-->

          <div class="row">

            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Ongoing Vacancies</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                        <th>Ref.</th>
                        <th>Title</th>
                          <th>Category</th>

                          <th>Closing Date</th>
                          <th>Updated By</th>

                        </tr>
                      </thead>
                      <tbody>
                          @if ($company->vacancies->count()>0)


                          @foreach ($company->vacancies as $vacancy)

                          @if ($vacancy->end>=date('Y-m-d'))


                          <tr>
                              <th>{{$vacancy->regNumber}}</th>
                            <th><a href="{{route('vacancy.show',$vacancy->id)}}">
                                @if ($vacancy->title)
                                {{$vacancy->title->name}}
                                @else
                                    Not Set Yet
                                @endif
                            </a>
                            </th>
                            <td> @if ($vacancy->category)
                                {{$vacancy->category->name}}
                                @else
                                    Not Set Yet
                                @endif
                                </td>
                            <td>

                                {{$vacancy->end}}


                            </td>

                            <td>
                                {{$vacancy->author}}<br>
                                {{$vacancy->updated_at->diffForHumans()}}
                            </td>
                          </tr>
                          @endif
                          @endforeach

                          @else
                              No Vacancies
                          @endif

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Closed Vacancies</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                          <th>Ref.</th>
                          <th>Title</th>
                            <th>Category</th>

                            <th>Closing Date</th>
                            <th>Updated By</th>

                          </tr>
                        </thead>
                        <tbody>
                            @if ($company->vacancies->count()>0)


                            @foreach ($company->vacancies as $vacancy)

                            @if ($vacancy->end<date('Y-m-d'))


                            <tr>
                                <th>{{$vacancy->regNumber}}</th>
                              <th><a href="{{route('vacancy.show',$vacancy->id)}}">
                                  @if ($vacancy->title)
                                  {{$vacancy->title->name}}
                                  @else
                                      Not Set Yet
                                  @endif
                              </a>
                              </th>
                              <td> @if ($vacancy->category)
                                  {{$vacancy->category->name}}
                                  @else
                                      Not Set Yet
                                  @endif
                                  </td>
                              <td>

                                  {{$vacancy->end}}


                              </td>

                              <td>
                                  {{$vacancy->author}}<br>
                                  {{$vacancy->updated_at->diffForHumans()}}
                              </td>
                            </tr>
                            @endif
                            @endforeach

                            @else
                                No Vacancies
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






<!-- Statistics Section-->




@endsection
