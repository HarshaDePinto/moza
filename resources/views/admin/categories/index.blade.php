@extends('layouts.my')

@section('styles')


@endsection

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4> <i class="icon-check"></i> Add Job Category</h4>
            </div>
            <div class="card-body">
              <form class="form-inline" action="{{route('category.store')}}" method="POST">
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
                  <label for="name" class="sr-only">Category Name</label>
                  <input id="name" name="name" type="text"  class="mr-3 form-control">
                </div>
                <input id="author" name="author" type="text"  value="{{ Auth::user()->name}}" hidden>
                <div class="form-group">
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
                <h4>All Job Categories</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Category</th>
                      <th>Job Titles</th>
                        <th>Companies</th>
                        <th>Delete</th>
                        <th>Updated By</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                          <th>{{$category->name}}
                            <ul >
                                <li>{{$category->titles->count()}} Titles</li>
                                <li>{{$category->companies->count()}} companies</li>
                            </ul>

                          </th>
                          <td>
                              <ul>
                                @foreach ($category->titles as $title)
                              <li>{{$title->name}}</li>
                                @endforeach

                              </ul>


                          </td>

                          <td>
                            <ul class="list-unstyled">
                              @foreach ($category->companies as $company)
                            <li><a href="{{route('company.show',$company->id)}}">{{$company->name}}</a></li>
                              @endforeach

                            </ul>


                        </td>

                          <td>
                            <a href="" class="btn btn-danger btn-sm"  onclick="handleDelete({{$category->id}})" data-toggle="modal" data-target="#deleteModal{{$category->id}}">Delete</a>

                            <form action="" method="POST" id="deleteCategory">

                                @csrf
                                @method('DELETE')

                            <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">{{$category->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">


                                        @if ($category->titles->count()>0)
                                        <p>You Can Not Delete This Category, It Have Job Titles </p>

                                        @else
                                        <p>Are You Sure To Delete?</p>
                                        @endif


                                    </div>
                                    <div class="modal-footer">
                                        @if ($category->titles->count()>0)
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Go Back</button>

                                        @else
                                        <button type="button" class="btn btn-success" data-dismiss="modal">No Go Back</button>
                                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                                        @endif

                                    </div>
                                </div>
                                </div>
                            </div>

                          </td>
                          <td>
                            {{$category->updated_at->diffForHumans()}}<br> {{$category->author}}
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

<script>
    function handleDelete(id){

        var form = document.getElementById('deleteCategory')
        form.action='/category/'+id

    }

</script>

@endsection
