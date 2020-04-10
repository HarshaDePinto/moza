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
                    <h4 class="ml-4">Applicant Reject</h4>

                  </div>
                  <div class="card-body">


                    <form class="form-horizontal" action="{{isset($applicant)?route('reject.store',$applicant->id):route('reject.store')}}" method="POST" enctype="multipart/form-data">
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



                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label" for="applicant_id">Applicant</label>
                      <div class="col-sm-10 mb-3">
                        <select name="applicant_id" class="form-control" id="applicant_id">
                            @foreach ($applicants as $dapplicant)
                        <option value="{{$dapplicant->id}}"
                            @if (isset($applicant))
                                @if ($dapplicant->id==$applicant->id)
                                selected
                                @endif

                            @endif

                            >

                            {{$dapplicant->name}}
                            </option>

                            @endforeach

                        </select>

                      </div>
                    </div>



                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="date">Reject date </label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="date" required>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-sm-2 form-control-label" for="note">Reason</label>
                        <div class="col-sm-10">
                            <input id="note" type="hidden" name="note" >
                            <trix-editor input="note"></trix-editor>
                        </div>
                      </div>


                            <input id="author" type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" hidden>


                      <div class="line"></div>
                      <div class="form-group row ">
                        <div class="col-sm-4 offset-sm-2">

                          <button type="submit" class="btn btn-primary ">Rejected</button>
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
