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
                <h4>All Users</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Update By</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                          <td>
                            <a href="{{route('user.show',$user->id)}}">
                            @if ($user->image)
                            <img class="rounded-circle mr-2" width="50" src="{{ asset('storage/app/public/'.$user->image) }}" alt="No Image">
                            @else
                            <img class="rounded-circle mr-2" width="50" src="{{ asset('public/img/no.png') }}" alt="No Image">
                            @endif
                            </a>
                          </td>
                          <td>
                            <a href="{{route('user.show',$user->id)}}">
                            {{$user->name}}
                            </a>
                          </td>

                          <td>
                            {{$user->position}}
                          </td>
                          <td>
                              @if ($user->is_active==1)
                                  Active
                              @else
                                  Inactive
                              @endif
                          </td>

                          <td>
                            {{$user->updated_at->diffForHumans()}}<br> {{$user->author}}

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
      </div>
@endsection

@section('scripts')


@endsection
