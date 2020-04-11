
@extends('layouts.adstudent')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    {{-- Trix Editor --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">

@endsection

@section('content')

    <div id="addLevel" class="container-fluid">

        <div class="card">
            <div class="card-header d-flex align-items-center">
            <h4> <i class="icon-check"></i> Add Subject for <span class="text-info">{{$level->name}}</span> </h4>
            </div>
            <div class="card-body">
              <form class="form-horizontal" action="{{route('stuSub.store')}}" method="POST">
                @csrf



                <div class="form-group">
                  <label for="name" >Subject</label>
                  <input id="name" name="name" type="text"  class="mr-3 form-control" required>
                </div>
                <div class="form-group">
                    <label for="des" >Description</label>
                    <input id="des" type="hidden" name="des">
                                    <trix-editor input="des"></trix-editor>

                </div>
                <input id="author" name="author" type="text"  value="{{ Auth::user()->name}}" hidden>
                <input id="level_id" name="level_id" type="text"  value="{{$level->id}}" hidden>
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


@endsection

