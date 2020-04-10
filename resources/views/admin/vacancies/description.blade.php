@extends('layouts.my')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">

@endsection

@section('content')
    <div class="container-fluid">
        <div class="raw">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header d-flex align-items-center">

                    <h4 class="ml-4">
                        @if (isset($vacancy))
                            @if ($vacancy->title)
                            {{$vacancy->title->name}}
                            @else
                                Not Set Yet
                            @endif

                        @else
                                New Vacancy
                        @endif

                        </h4>

                  </div>
                  <div class="card-body">


                    <form class="form-horizontal" action="{{isset($vacancy)?route('vacancy.update',$vacancy->id):route('vacancyDescription',$vacancy->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($vacancy))
                        @method('PUT')
                        @endif


                        {{-- For ERRORS --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="alert-group">
                                    @foreach ($errors->all() as $error)
                                        <li class="alert-group-item text-danger">
                                             <h3>{{$error}}</h3>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                      <div class="form-group row">
                          @if (isset($vacancy))

                            <label class="col-sm-2 form-control-label" for="category_id">Job Category</label>
                            <div class="col-sm-10 mb-3">
                              <select name="category_id" class="form-control" id="category_id">

                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}"
                                            @if (isset($vacancy->category))
                                            @if ($category->id==$vacancy->category->id)
                                            selected
                                            @endif

                                            @endif

                                            >

                                    {{$category->name}}
                                    </option>

                                    @endforeach

                              </select>

                            </div>

                          @else
                          <h3 class="display h4">Job Category <span class="text-info">{{$vacancy->category->name}}</span></h3>
                          @endif





                      </div>


                      <div class="form-group row">
                        @if (isset($vacancy))
                        <label class="col-sm-2 form-control-label" for="title_id">Job Title</label>
                        <div class="col-sm-10 mb-3">
                          <select name="title_id" class="form-control" id="title_id">

                                @foreach ($titles as $title)
                                    <option value="{{$title->id}}"
                                        @if (isset($vacancy->title))
                                        @if ($title->id==$vacancy->title->id)
                                        selected
                                        @endif

                                        @endif

                                        >

                                {{$title->name}}
                                </option>

                                @endforeach

                          </select>

                        </div>
                        @else
                        <h3 class="display h4">Job Title <span class="text-info">{{$vacancy->title->name}}</span></h3>
                        @endif




                      </div>




                      <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label" for="company_id">Company Name</label>
                      <div class="col-sm-10 mb-3">
                        <select name="company_id" class="form-control" id="company_id">
                            @foreach ($companies as $company)
                        <option value="{{$company->id}}">

                            {{$company->name}}
                            </option>

                            @endforeach

                        </select>

                      </div>
                    </div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="number">Number Of Vacancies </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="number" placeholder="Number only No latters" value="{{isset($vacancy)?$vacancy->number:''}}" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="time">Working Houres</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="time" value="{{isset($vacancy)?$vacancy->time:''}}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="salary">Salary Range</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="salary" value="{{isset($vacancy)?$vacancy->salary:''}}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="gender">Gender Preference</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="gender" value="{{isset($vacancy)?$vacancy->gender:''}}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="start">Open Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="start" value="{{isset($vacancy)?$vacancy->start:''}}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="end">Closed Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="end" value="{{isset($vacancy)?$vacancy->end:''}}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="des">Job Description</label>
                        <div class="col-sm-10">
                            <input id="des" type="hidden" name="des" value="{{isset($vacancy)?$vacancy->des:''}}">
                            <trix-editor input="des"></trix-editor>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="edu">Educational qualifications</label>
                        <div class="col-sm-10">
                            <input id="edu" type="hidden" name="edu" value="{{isset($vacancy)?$vacancy->edu:''}}">
                            <trix-editor input="edu"></trix-editor>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="ben">Other Benifits</label>
                        <div class="col-sm-10">
                            <input id="ben" type="hidden" name="ben" value="{{isset($vacancy)?$vacancy->ben:''}}">
                            <trix-editor input="ben"></trix-editor>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="note">Note</label>
                        <div class="col-sm-10">
                            <input id="note" type="hidden" name="note" value="{{isset($vacancy)?$vacancy->note:''}}">
                            <trix-editor input="note"></trix-editor>
                        </div>
                      </div>


                            <input id="author" type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" hidden>


                      <div class="line"></div>
                      <div class="form-group row ">
                        <div class="col-sm-4 offset-sm-2">

                          <button type="submit" class="btn btn-primary ">{{isset($vacancy)?'Save changes':'Add Vacancy'}}</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>


@endsection
