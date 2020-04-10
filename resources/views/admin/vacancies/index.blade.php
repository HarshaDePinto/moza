@extends('layouts.my')





@section('content')

<section>
    <div class="container-fluid">
      <!-- Page Header-->

      <div class="row">

        <div class="col-lg-12">
            <div id="main_place">
                <div class="card">
                    <div class="card-header">
                    <h4><button style="background-color:#0066ff ;" class="btn   text-white" onclick="show('operation1')"><i class="fas fa-user-tie"></i>On Going Vacancies</button> <button style="background-color:#ff9933 ;" class="btn   text-white" onclick="show('operation2')"><i class="fas fa-user-tie"></i>Closed Vacancies</button></h4>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th>Ref.</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Company</th>
                            <th>Updated By</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vacancies as $vacancy)
                            @if ($vacancy->end>=date('Y-m-d'))

                            <tr>
                                <th>{{$vacancy->regNumber}}</th>
                                <th><a href="{{route('vacancy.show',$vacancy->id)}}">
                                    @if ($vacancy->title)
                                    {{$vacancy->title->name}}
                                    @else
                                        Not Set Yet
                                    @endif
                                </a>
                                </th>
                                <td> @if ($vacancy->category)
                                    {{$vacancy->category->name}}
                                    @else
                                        Not Set Yet
                                    @endif
                                    </td>
                                <td>
                                    @if ($vacancy->company)
                                    <a href="{{route('company.show',$vacancy->company->id)}}">
                                    {{$vacancy->company->name}}
                                    </a>
                                    @else
                                        Not Set Yet
                                    @endif

                                </td>

                                <td>
                                    {{$vacancy->author}}<br>
                                    {{$vacancy->updated_at->diffForHumans()}}
                                </td>
                            </tr>
                            @endif
                            @endforeach



                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>

      </div>
    </div>
</section>
<div id="operation1" style="display:none">
    <div class="card">
        <div class="card-header">
        <h4><button style="background-color:#0066ff ;" class="btn   text-white" onclick="show('operation1')"><i class="fas fa-user-tie"></i>Ongoing Vacancies</button> <button style="background-color:#ff9933 ;" class="btn   text-white" onclick="show('operation2')"><i class="fas fa-user-tie"></i>Closed Vacancies</button></h4>
        <br>
        <h4>Ongoing Vacancies</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>Ref.</th>
                <th>Title</th>
                <th>Category</th>
                <th>Company</th>
                <th>Updated By</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($vacancies as $vacancy)
                @if ($vacancy->end>=date('Y-m-d'))

                <tr>
                    <th>{{$vacancy->regNumber}}</th>
                    <th><a href="{{route('vacancy.show',$vacancy->id)}}">
                        @if ($vacancy->title)
                        {{$vacancy->title->name}}
                        @else
                            Not Set Yet
                        @endif
                    </a>
                    </th>
                    <td> @if ($vacancy->category)
                        {{$vacancy->category->name}}
                        @else
                            Not Set Yet
                        @endif
                        </td>
                    <td>
                        @if ($vacancy->company)
                        <a href="{{route('company.show',$vacancy->company->id)}}">
                        {{$vacancy->company->name}}
                        </a>
                        @else
                            Not Set Yet
                        @endif

                    </td>

                    <td>
                        {{$vacancy->author}}<br>
                        {{$vacancy->updated_at->diffForHumans()}}
                    </td>
                </tr>
                @endif
                @endforeach



            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

<div id="operation2" style="display:none">
    <div class="card">
        <div class="card-header">
        <h4><button style="background-color:#0066ff ;" class="btn   text-white" onclick="show('operation1')"><i class="fas fa-user-tie"></i>Ongoing Vacancies</button> <button style="background-color:#ff9933 ;" class="btn   text-white" onclick="show('operation2')"><i class="fas fa-user-tie"></i>Closed Vacancies</button></h4>
        <br>
        <h4>Closed Vacancies</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>Ref.</th>
                <th>Title</th>
                <th>Category</th>
                <th>Company</th>
                <th>Updated By</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($vacancies as $vacancy)
                @if ($vacancy->end<date('Y-m-d'))

                <tr>
                    <th>{{$vacancy->regNumber}}</th>
                    <th><a href="{{route('vacancy.show',$vacancy->id)}}">
                        @if ($vacancy->title)
                        {{$vacancy->title->name}}
                        @else
                            Not Set Yet
                        @endif
                    </a>
                    </th>
                    <td> @if ($vacancy->category)
                        {{$vacancy->category->name}}
                        @else
                            Not Set Yet
                        @endif
                        </td>
                    <td>
                        @if ($vacancy->company)
                        <a href="{{route('company.show',$vacancy->company->id)}}">
                        {{$vacancy->company->name}}
                        </a>
                        @else
                            Not Set Yet
                        @endif

                    </td>

                    <td>
                        {{$vacancy->author}}<br>
                        {{$vacancy->updated_at->diffForHumans()}}
                    </td>
                </tr>
                @endif
                @endforeach



            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    <script>
        function show(param_div_id) {
        document.getElementById('main_place').innerHTML = document.getElementById(param_div_id).innerHTML;
        }
    </script>
@endsection
