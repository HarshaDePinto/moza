@extends('layouts.my')

@section('styles')


@endsection

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4> <i class="icon-check"></i> First Add Category</h4>
            </div>
            <div class="card-body">
              <form class="form-inline" action="{{route('vacancy.store')}}" method="POST">
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
                    <label class="col-sm-2 form-control-label" for="regNumber">Ref. Number </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="regNumber" required>
                    </div>
                  </div>

                <div class="form-group">
                    <label for="category_id" class="sr-only">Job Category</label>

                    <select name="category_id" class="form-control" id="category_id">

                        @foreach ($categories as $category)
                    <option value="{{$category->id}}" >

                        {{$category->name}}
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

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
@endsection

@section('scripts')


@endsection
