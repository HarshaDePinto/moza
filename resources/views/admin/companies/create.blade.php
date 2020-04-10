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
                    @if (isset($company))
                    <a href="{{route('company.show',$company->id)}}"><i class="fa fa-caret-square-o-left" style="font-size:20px"></i> </a>
                    @endif
                    <h4 class="ml-4">{{isset($company)?'Edit Company':'Add New Company'}}</h4>

                  </div>
                  <div class="card-body">


                    <form class="form-horizontal" action="{{isset($company)?route('company.update',$company->id):route('company.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if (isset($company))
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

{{--
                      <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label" for="title_id">Job Title</label>
                      <div class="col-sm-10 mb-3">
                        <select name="title_id" class="form-control" id="title_id">
                            @foreach ($titles as $title)
                        <option value="{{$title->id}}"
                            @if (isset($applicant))
                                @if ($title->id==$applicant->title_id)
                                selected
                                @endif

                            @endif

                            >

                            {{$title->name}}
                            </option>

                            @endforeach

                        </select>

                      </div>
                    </div> --}}
                    <div class="line"></div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label" for="regNumber">Company Ref. Number<br><small class="text-primary">Office Use</small></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="regNumber" value="{{isset($company)?$company->regNumber:''}}" required >
                      </div>
                    </div>
                    <div class="line"></div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="name">Company Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="{{isset($company)?$company->name:''}}" required >
                        </div>
                      </div>
                      <div class="line"></div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="reg">Company Reg. No</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="reg" value="{{isset($company)?$company->reg:''}}">
                        </div>
                      </div>

                      <div class="line"></div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="web">Company Website</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="web" value="{{isset($company)?$company->web:''}}">
                        </div>
                      </div>




                      <div class="line"></div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="location">Location</label>
                        <div class="col-sm-10">
                            <input id="location" type="hidden" name="location" value="{{isset($company)?$company->location:''}}">
                            <trix-editor input="location"></trix-editor>
                        </div>
                      </div>

                      <div class="line"></div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="contact_person_name"> Contact Person Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="contact_person_name" value="{{isset($company)?$company->contact_person_name:''}}">
                        </div>
                      </div>

                      <div class="line"></div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="contact_person_position"> Contact Person Position</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="contact_person_position" value="{{isset($company)?$company->contact_person_position:''}}">
                        </div>
                      </div>

                      <div class="line"></div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="contact_person_email"> Contact Person Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="contact_person_email" value="{{isset($company)?$company->contact_person_email:''}}">
                        </div>
                      </div>

                      <div class="line"></div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="contact_person_tel"> Contact Person Tel</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="contact_person_tel" value="{{isset($company)?$company->contact_person_tel:''}}">
                        </div>
                      </div>

                      <div class="line"></div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="note">Note</label>
                        <div class="col-sm-10">
                            <input id="note" type="hidden" name="note" value="{{isset($company)?$company->note:''}}">
                            <trix-editor input="note"></trix-editor>
                        </div>
                      </div>


                            <input id="author" type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" hidden>


                      <div class="line"></div>
                      <div class="form-group row ">
                        <div class="col-sm-4 offset-sm-2">

                          <button type="submit" class="btn btn-primary ">{{isset($company)?'Save changes':'Add Company'}}</button>
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
