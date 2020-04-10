@extends('layouts.my')

@section('styles')


@endsection

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4> <i class="icon-check"></i> Select Job Title</h4>
            </div>
            <div class="card-body">
              <form class="form-inline" action="{{route('vacancyTitle',$vacancy->id)}}" method="POST">
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


                <div class="form-group">
                    <label for="category_id" class="sr-only">Job Title</label>

                    <select name="title_id" class="form-control" id="title_id">

                        @foreach ($titles as $title)
                    <option value="{{$title->id}}" >

                        {{$title->name}}
                        </option>

                        @endforeach

                    </select>

                  </div>


                  <input id="author" name="author" type="text"  value="{{ Auth::user()->name}}" hidden>
                <div class="form-group ml-2">
                  <input type="submit" value="Add" class="mr-3 btn btn-primary">
                </div>
              </form>
            </div>
          </div>
    </div>

    <div class="container-fluid">
        <!-- Page Header-->

        <div class="row">

          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>Vacancy</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <h3 class="display h4">Category <span class="text-info">{{$vacancy->category->name}}</span></h3>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
@endsection

@section('scripts')


@endsection
