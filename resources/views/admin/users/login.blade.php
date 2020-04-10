
@extends('layouts.my')

@section('styles')


@endsection

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4> <i class="icon-check"></i> Change Password</h4>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('user.login',$user->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('name') is-invalid @enderror" name="password" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="author" class="col-md-4 col-form-label text-md-right">Edited By</label>

                        <div class="col-md-6">
                            <input id="author" type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Update Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
    </div>


@endsection

@section('scripts')


@endsection
