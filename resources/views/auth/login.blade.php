@extends('layouts.mylog')

@section('content')

<div class="page login-page">
    <div class="container">
      <div class="form-outer text-center d-flex align-items-center">
        <div class="form-inner">
          <div class="logo text-uppercase"><strong class="text-primary">Mozita Group</strong><span> ADMIN</span></div>
          <p>Authorized Users Only</p>


          <form method="POST" action="{{ route('login') }}" class="text-left form-validate">

            @csrf


            <div class="form-group-material">
                <input id="email" type="email" class="input-material @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              <label for="login-username" class="label-material">E Mail</label>
            </div>
            <div class="form-group-material">
                <input id="password" type="password" class="input-material @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              <label for="login-password" class="label-material">Password</label>
            </div>

            <div class="form-group-material">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" checked readonly hidden>


            </div>

            <div class="form-group text-center"><button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

            </div>

        </form>
        <small>Do not have an account? </small><a href="" class="signup">Signup</a>

        </div>

      </div>
    </div>
  </div>
@endsection
