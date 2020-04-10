@extends('layouts.my')

@section('styles')


@endsection

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4> <i class="icon-check"></i> Add Users</h4>
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>

                        <div class="col-md-6">
                            <input id="position" type="text" class="form-control" name="position">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role_id" class="col-md-4 col-form-label text-md-right">User Role</label>

                        <div class="col-md-6">

                            <select name="role_id" class="form-control" id="role_id">
                                <option value="2">Not an Admin</option>
                                <option value="1">Admin</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="is_active" class="col-md-4 col-form-label text-md-right">User Role</label>

                        <div class="col-md-6">

                            <select name="is_active" class="form-control" id="is_active">
                                <option value="2">Not Active</option>
                                <option value="1">Active</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="author" class="col-md-4 col-form-label text-md-right">Updated By</label>

                        <div class="col-md-6">
                            <input id="author" type="text" class="form-control" name="author" value="{{ Auth::user()->name}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
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
