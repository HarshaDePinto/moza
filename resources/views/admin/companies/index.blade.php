@extends('layouts.my')





@section('content')

<section>
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4><a class="navbar-brand" href="{{route('company.index')}}"><i class="fa fa-caret-square-o-left" style="font-size:20px"></i></a> <i class="icon-check"></i> Find A Company</h4>
            </div>
            <div class="card-body">
              <form class="form-inline" action="{{route('cpName')}}" method="POST">
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
                  <label for="name" class="sr-only">Company Name</label>
                  <input id="name" name="name" type="text"  class="mr-3 form-control">
                </div>

                <div class="form-group">

                  <button type="submit" class="mr-3 btn btn-primary"> <i class="fa fa-search" style="font-size:48px"></i></button>
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
              <h4>All Companies</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Ref.</th>
                      <th>Name</th>
                      <th>Reg.No</th>
                      <th>Categories</th>
                      <th>Updated By</th>

                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($companies as $company)
                      <tr>
                        <td>{{$company->regNumber}}</td>
                        <th><a href="{{route('company.show',$company->id)}}">

                            {{$company->name}}
                        </a>
                        </th>
                        <td>{{$company->reg}}</td>
                        <td>
                           @if ($company->categories)
                           <ul>
                               @foreach ($company->categories as $category)

                               <li>
                                   {{$category->name}}

                                </li>


                               @endforeach
                            </ul>
                           @else
                               Not Set Yet
                           @endif
                        </td>

                        <td>
                            {{$company->author}}<br>
                            {{$company->updated_at->diffForHumans()}}
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
  </section>

@endsection


