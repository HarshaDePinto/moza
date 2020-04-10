@extends('layouts.adStudent')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    {{-- Trix Editor --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">

@endsection

@section('content')
    {{-- Search --}}
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-flex align-items-center">
            <h4><a class="navbar-brand" href="{{route('stuLev.index')}}"><i class="fa fa-caret-square-o-left" style="font-size:20px"></i></a> <i class="icon-check"></i> Find An Educational Level <a class="navbar-brand" href="#addLevel"><i class="mx-4 fa fa-plus-circle" style="font-size:20px;color:green"></i></a></h4>
            </div>
            <div class="card-body">
                <form class="form-inline" action="{{route('stLevName')}}" method="POST">
                    @csrf



                        <div class="form-group">

                            <input type="text" name="name" id="name" placeholder="Enter Level" class="form-control">
                            <div class="" id="name_list"></div>
                        </div>




                    <div class="form-group">

                        <button type="submit" class="float-right btn btn-primary">
                            <i class="fa fa-search" style="font-size:48px"></i>
                        </button>
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
                <h4>Levels of the NZQF</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Level</th>
                        <th>Subjects</th>
                        <th>Cources</th>
                        <th>Students</th>
                        <th>Colleges</th>
                        <th>Updated By</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($levels as $level)
                        <tr>
                          <th>
                          <a href="{{route('stuLev.show',$level->id)}}">{{$level->name}}</a>

                          </th>
                          <td>12</td>
                          <td>12</td>
                          <td>12</td>
                          <td>12</td>
                          <td>
                            {{$level->updated_at->diffForHumans()}}<br> {{$level->author}}
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

    <div id="addLevel" class="container-fluid">

        <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4> <i class="icon-check"></i> Add Levels of the NZQF</h4>
            </div>
            <div class="card-body">
              <form class="form-horizontal" action="{{route('stuLev.store')}}" method="POST">
                @csrf



                <div class="form-group">
                  <label for="name" >NZQF Level</label>
                  <input id="name" name="name" type="text"  class="mr-3 form-control" required>
                </div>
                <div class="form-group">
                    <label for="des" >Description</label>
                    <input id="des" type="hidden" name="des">
                                    <trix-editor input="des"></trix-editor>

                </div>
                <input id="author" name="author" type="text"  value="{{ Auth::user()->name}}" hidden>
                <div class="form-group">
                  <input type="submit" value="Add" class="mr-3 btn btn-primary">
                </div>
              </form>
            </div>
          </div>
    </div>

@endsection

@section('scripts')

    {{-- Trix Editor --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $('#name').on('keyup',function() {
                var query = $(this).val();
                $.ajax({

                    url:"{{ route('autocomplete') }}",

                    type:"GET",

                    data:{'name':query},

                    success:function (data) {

                        $('#name_list').html(data);
                    }
                })
                // end of ajax call
            });


            $(document).on('click', 'li', function(){

                var value = $(this).text();
                $('#name').val(value);
                $('#name_list').html("");
            });
        });
    </script>
@endsection
