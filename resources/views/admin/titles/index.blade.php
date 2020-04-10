@extends('layouts.my')

@section('styles')


@endsection

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4> <i class="icon-check"></i> Add Job Title</h4>
            </div>
            <div class="card-body">
              <form class="form-inline" action="{{route('title.store')}}" method="POST">
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
                  <label for="name" class="sr-only">Job Title</label>
                  <input id="name" name="name" type="text"  class="mr-3 form-control">
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
                <h4>All Job Titles</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Job Titles</th>
                        <th>Category</th>
                        <th>Applicants</th>
                        <th>Delete</th>
                        <th>Updated By</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($titles as $title)
                        <tr>
                          <th>{{$title->name}}
                            <ul >
                                <li>{{$title->applicants->count()}} Applicants</li>

                            </ul>
                          </th>
                          <td>
                            {{$title->category->name}}

                          </td>

                          <td>
                            <ul class="list-unstyled">
                              @foreach ($title->applicants as $applicant)
                            <li><a href="{{route('applicant.show',$applicant->id)}}">{{$applicant->name}}</a></li>
                              @endforeach

                            </ul>


                        </td>

                          <td>
                            <a href="" class="btn btn-danger btn-sm"  onclick="handleDelete({{$title->id}})" data-toggle="modal" data-target="#deleteModal{{$title->id}}">Delete</a>

                            <form action="" method="POST" id="deleteTitle">

                                @csrf
                                @method('DELETE')

                            <div class="modal fade" id="deleteModal{{$title->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel"> {{$title->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">

                                    <p>Are You Sure To Delete?</p>

                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">No Go Back</button>
                                    <button type="submit" class="btn btn-danger">Yes Delete</button>
                                    </div>
                                </div>
                                </div>
                            </div>

                          </td>

                          <td>
                            {{$title->updated_at->diffForHumans()}}<br> {{$title->author}}
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

        var form = document.getElementById('deleteTitle')
        form.action='/title/'+id

    }

</script>

@endsection
