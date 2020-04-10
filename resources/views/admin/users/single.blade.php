@extends('layouts.my')

@section('styles')


@endsection

@section('content')

    <div class="container-fluid">
        <!-- Page Header-->

        <div class="row">

          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
              </div>
              <div class="card-body">
                <div class="media">
                    @if ($user->image)
                    <img class="rounded-circle mr-2" width="50" src="{{ asset("storage/app/public/$user->image") }}" alt="No Image">
                    @else
                    <img class="rounded-circle mr-2" width="50" src="{{ asset('public/img/no.png') }}" alt="No Image">
                    @endif
                    <div class="media-body">
                    <h5 class="mt-0">{{$user->name}}</h5>
                      <h6>{{$user->position}}</h6>
                    <h6><a class="btn btn-info btn-sm text-white" href="{{route('user.edit',$user->id)}}">Edit</a>

                        <a href="{{route('user.changePassword',$user->id)}}" class="btn btn-info  text-white btn-sm" >
                            Change Password</a></h6>
                    </div>
                  </div>
              </div>
            </div>
          </div>

        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Login Info</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Login Date</th>
                      <th>Login Time</th>
                      <th>Logout Date</th>
                      <th>Logout Time</th>
                      <th>Logout</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($user->logins as $login)
                      <tr>
                        <td>
                            {{ date('d-M-Y', strtotime($login->in)) }}
                        </td>
                        <td>
                            {{ date('h:i a', strtotime($login->in)) }}
                        </td>

                        <td>
                            @if ($login->out)
                            {{ date('d-M-Y', strtotime($login->out)) }}
                            @else
                               <span class="text-primary">Online</span>
                            @endif

                        </td>
                        <td>
                            @if ($login->out)

                            {{ date('h:i a', strtotime($login->out)) }}
                            @else
                            <span class="text-primary">Online</span>
                            @endif

                        </td>
                        <td>
                            @if ($login->out)

                            {{$login->updated_at->diffForHumans()}}
                            @else
                            <span class="text-primary">Online</span>
                            @endif

                        </td>



                      </tr>
                      @endforeach



                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

    </div>
@endsection

@section('scripts')


@endsection
