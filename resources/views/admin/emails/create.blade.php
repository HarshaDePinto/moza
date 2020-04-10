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
                    @if (isset($applicant))
                    <a href="{{route('applicant.show',$applicant->id)}}"><i class="fa fa-caret-square-o-left" style="font-size:20px"></i> </a>
                    @endif
                    <h4 class="ml-4">Send An Email</h4>

                  </div>
                  <div class="card-body">


                    <form class="form-horizontal" action="{{isset($applicant)?route('mail.send'):route('mail.send')}}" method="POST" enctype="multipart/form-data">
                        @csrf



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
                        <label class="col-sm-2 form-control-label" for="name">Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" readonly value="{{$applicant->name}}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="email">Email</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" readonly value="{{$applicant->email}}">
                        </div>
                      </div>

                    <div class="line"></div>
                      <div class="form-group row">
                          <label class="col-sm-2 form-control-label" for="subject">Subject</label>
                          <div class="col-sm-10">
                          <input type="text" class="form-control" name="subject" required>
                          </div>
                        </div>



                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="body">Content</label>
                        <div class="col-sm-10">
                            <input id="body" type="hidden" name="body" >
                            <trix-editor input="body"></trix-editor>
                        </div>
                      </div>




                            <input id="author" type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" hidden>

                            <input id="applicant_id" type="text" class="form-control" name="applicant_id" value="{{ $applicant->id}}" hidden>


                      <div class="line"></div>
                      <div class="form-group row ">
                        <div class="col-sm-4 offset-sm-2">

                          <button type="submit" class="btn btn-primary ">Send</button>
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
