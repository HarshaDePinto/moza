@extends('layouts.my')

@section('styles')


@endsection

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4> <i class="icon-check"></i> Edit Users</h4>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus>

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
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>




                    <div class="form-group row">
                        <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>

                        <div class="col-md-6">
                            <input id="position" type="text" class="form-control" name="position" value="{{$user->position}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role_id" class="col-md-4 col-form-label text-md-right">User Role</label>

                        <div class="col-md-6">

                            <select name="role_id" class="form-control" id="role_id">
                                @if ($user->role_id==1)
                                <option value="2">Not an Admin</option>
                                <option value="1" selected>Admin</option>
                                @else
                                <option value="2" selected>Not an Admin</option>
                                <option value="1">Admin</option>
                                @endif


                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="is_active" class="col-md-4 col-form-label text-md-right">User Role</label>

                        <div class="col-md-6">

                            <select name="is_active" class="form-control" id="is_active">
                                @if ($user->is_active==1)
                                <option value="2">Not Active</option>
                                <option value="1" selected>Active</option>
                                @else
                                <option value="2" selected>Not Active</option>
                                <option value="1">Active</option>
                                @endif


                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 col-form-label text-md-right">
                        @if ($user->image)
                                <img class="mr-3" width="200" src="{{ asset('storage/app/public/'.$user->image) }}" alt="No Image">
                                @else
                                {{'No Image'}}
                                @endif
                        </div>
                        <div class="col-md-4">
                            <input id="image" type="file" class="form-control" name="image" value="{{$user->image}}">
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
                                Edit User
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
