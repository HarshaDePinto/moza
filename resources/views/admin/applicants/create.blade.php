@extends('layouts.my')

@section('styles')

    {{-- Trix Editor --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">

@endsection


@section('content')

    <div class="container-fluid">
        <div class="raw">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header d-flex align-items-center">
                        @if (isset($applicant))
                            <a href="{{route('applicant.show',$applicant->id)}}">
                                <i class="fa fa-caret-square-o-left" style="font-size:20px"></i>
                            </a>
                        @endif
                        <h4 class="ml-4 text-info">
                            {{isset($applicant)?'Edit Applicant':'Add New Applicant'}}
                        </h4>

                    </div>

                    <div class="card-body">

                        <form class="form-horizontal" action="{{isset($applicant)?route('applicant.update',$applicant->id):route('applicant.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @if (isset($applicant))
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


                            <div class="line"></div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="status">
                                    Status
                                </label>
                                <div class="col-sm-10 mb-3">
                                    <select name="status" class="form-control" id="status">

                                        <option value="Processing">

                                            Processing
                                        </option>
                                        <option value="Hired">
                                            Hired
                                        </option>
                                        <option value="Rejected">

                                            Rejected
                                        </option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="regNumber">
                                    Ref. Number <br>
                                    <small class="text-primary">
                                        Office Use
                                    </small>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="regNumber" value="{{isset($applicant)?$applicant->regNumber:''}}" required >
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="name">
                                    Applicant Name <br>
                                    <small class="text-primary">
                                        Full Name
                                    </small>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="{{isset($applicant)?$applicant->name:''}}" required >
                                </div>
                            </div>

                            <div class="line"></div>
                            <div class="form-group row">
                                <label for="profile" class="col-sm-2 form-control-label">
                                    Applicant Profile <br>
                                    <small class="text-primary">
                                        currently employed?
                                    </small>
                                </label>
                                <div class="col-sm-10">
                                    @if (isset($applicant))
                                        @if ($applicant->profile=='Yes')
                                            <div>
                                                <input id="optionsRadios1" type="radio"  value="Yes" name="profile" checked>
                                                <label for="optionsRadios1">
                                                    Yse
                                                </label>
                                            </div>
                                            <div>
                                                <input id="optionsRadios2" type="radio" value="No" name="profile">
                                                <label for="optionsRadios2">
                                                    No
                                                </label>
                                            </div>
                                        @else
                                            <div>
                                                <input id="optionsRadios1" type="radio"  value="Yes" name="profile">
                                                <label for="optionsRadios1">
                                                    Yse
                                                </label>
                                            </div>
                                            <div>
                                                <input id="optionsRadios2" type="radio" value="No" name="profile" checked>
                                                <label for="optionsRadios2">
                                                    No
                                                </label>
                                            </div>
                                        @endif

                                    @else
                                        <div>
                                            <input id="optionsRadios1" type="radio"  value="Yes" name="profile">
                                            <label for="optionsRadios1">
                                                Yse
                                            </label>
                                        </div>
                                        <div>
                                            <input id="optionsRadios2" type="radio" value="No" name="profile">
                                            <label for="optionsRadios2">
                                                No
                                            </label>
                                        </div>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="country">
                                    Applicant Country
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="country" value="{{isset($applicant)?$applicant->country:''}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="email">
                                    Applicant Email
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" value="{{isset($applicant)?$applicant->email:''}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="tel">
                                    Tel
                                </label>
                                <div class="col-sm-10">
                                    <input id="tel" type="hidden" name="tel" value="{{isset($applicant)?$applicant->tel:''}}">
                                    <trix-editor input="tel"></trix-editor>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="experience">
                                    Experience<br>
                                    <small class="text-primary">
                                        Please Enter Number Of Months
                                    </small>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Only a Number No Letters" class="form-control" name="experience" value="{{isset($applicant)?$applicant->experience:''}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="c_job">
                                    Applicant Current Job
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="c_job" value="{{isset($applicant)?$applicant->c_job:''}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="c_company">
                                    Applicant Current Company
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="c_company" value="{{isset($applicant)?$applicant->c_company:''}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="c_jd">
                                    Current Job Description
                                </label>
                                <div class="col-sm-10">
                                 <input id="c_jd" type="hidden" name="c_jd" value="{{isset($applicant)?$applicant->c_jd:''}}">
                                <trix-editor input="c_jd"></trix-editor>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="eduLevel">
                                    Educational Level
                                </label>
                                <div class="col-sm-10 mb-3">
                                    <select name="eduLevel" class="form-control" id="eduLevel">

                                        <option value="0"
                                            @if (isset($applicant))
                                                @if ($applicant->eduLevel==0)
                                                selected
                                                @endif

                                            @endif
                                            >

                                        NoT Selected
                                        </option>
                                        <option value="1"
                                            @if (isset($applicant))
                                                @if ($applicant->eduLevel==1)
                                                selected
                                                @endif

                                            @endif
                                            >

                                            Level 1
                                        </option>
                                        <option value="2"
                                            @if (isset($applicant))
                                                @if ($applicant->eduLevel==2)
                                                selected
                                                @endif

                                            @endif
                                            >

                                            Level 2
                                        </option>
                                        <option value="3"
                                            @if (isset($applicant))
                                                @if ($applicant->eduLevel==3)
                                                selected
                                                @endif

                                            @endif
                                            >

                                            Level 3
                                        </option>

                                        <option value="4"
                                            @if (isset($applicant))
                                                @if ($applicant->eduLevel==4)
                                                    selected
                                                @endif

                                            @endif
                                            >

                                            Level 4
                                        </option>

                                        <option value="5"
                                            @if (isset($applicant))
                                                @if ($applicant->eduLevel==5)
                                                selected
                                                @endif

                                            @endif
                                            >

                                            Level 5
                                        </option>

                                    </select>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="education">Educational Qualification</label>
                                <div class="col-sm-10">
                                    <input id="education" type="hidden" name="education" value="{{isset($applicant)?$applicant->education:''}}">
                                    <trix-editor input="education"></trix-editor>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="technical">Technical Qualification</label>
                                <div class="col-sm-10">
                                    <input id="technical" type="hidden" name="technical" value="{{isset($applicant)?$applicant->technical:''}}">
                                    <trix-editor input="technical"></trix-editor>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="history">Work History</label>
                                <div class="col-sm-10">
                                    <input id="history" type="hidden" name="history" value="{{isset($applicant)?$applicant->history:''}}">
                                    <trix-editor input="history"></trix-editor>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="image">Applicant Image</label>
                                <div class="col-sm-10">
                                <input type="file" class="form-control" name="image" id="image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="cv">Applicant CV <br> <small class="text-danger">*pdf only</small></label>
                                <div class="col-sm-10">
                                <input type="file" class="form-control" name="cv" id="cv">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="cl">Applicant Cover Letter<br> <small class="text-danger">*pdf only</small></label>
                                <div class="col-sm-10">
                                <input type="file" class="form-control" name="cl" id="cl">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label" for="ot">Applicant Other Document<br> <small class="text-danger">*pdf only</small></label>
                                <div class="col-sm-10">
                                <input type="file" class="form-control" name="ot" id="ot">
                                </div>
                            </div>

                                <input id="author" type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" hidden>


                            <div class="line"></div>
                            <div class="form-group row ">
                                <div class="col-sm-4 offset-sm-2">

                                <button type="submit" class="btn btn-primary ">{{isset($applicant)?'Save changes':'Add Applicant'}}</button>
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
    {{-- Trix Editor --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>


@endsection
