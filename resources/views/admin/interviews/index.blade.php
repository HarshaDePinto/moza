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
                    <h4><button style="background-color:#0066ff ;" class="btn   text-white" onclick="show('operation1')"><i class="fas fa-user-tie"></i>Pending Interviews</button> <button style="background-color:#ff9933 ;" class="btn   text-white" onclick="show('operation2')"><i class="fas fa-user-tie"></i>Closed Interviews</button></h4>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th>Ref.</th>
                            <th>Vacancy</th>
                            <th>Applicant</th>
                            <th>Company</th>
                            <th>Date</th>
                            <th>Updated By</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($interviews as $interview)
                            @if ($interview->date>=date('Y-m-d'))

                            <tr>
                                <th><a href="{{route('interview.show',$interview->id)}}">
                                    {{$interview->regNumber}}

                                </a>
                            </th>
                                <th><a href="{{route('vacancy.show',$interview->vacancy_id)}}">
                                    @if ($interview->vacancy)
                                    {{$interview->vacancy->title->name}}
                                    @else
                                        Not Set Yet
                                    @endif
                                </a>
                                </th>
                                <td> @if ($interview->applicant)
                                    <a href="{{route('applicant.show',$interview->applicant->id)}}">
                                        @if ($interview->applicant->image)
                        <img class="rounded-circle mr-2" width="30" src="{{ asset('storage/app/public/'.$interview->applicant->image) }}" alt="No Image">
                        @else
                        <img class="rounded-circle mr-2" width="30" src="{{ asset('public/img/no.png') }}" alt="No Image">
                        @endif
                                    {{$interview->applicant->name}}
                                    </a>
                                    @else
                                        Not Set Yet
                                    @endif
                                    </td>
                                <td>
                                    @if ($interview->vacancy)
                                    <a href="{{route('company.show',$interview->vacancy->company->id)}}">
                                    {{$interview->vacancy->company->name}}
                                    </a>
                                    @else
                                        Not Set Yet
                                    @endif

                                </td>

                                <th>
                                    {{date('d-M-Y',strtotime($interview->date))}}<br>
                                    {{$interview->time}}
                                </th>
                                <td>
                                    {{$interview->author}}<br>
                                    {{$interview->updated_at->diffForHumans()}}
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
        <h4><button style="background-color:#0066ff ;" class="btn   text-white" onclick="show('operation1')"><i class="fas fa-user-tie"></i>Pending Interviews</button> <button style="background-color:#ff9933 ;" class="btn   text-white" onclick="show('operation2')"><i class="fas fa-user-tie"></i>Closed Interviews</button></h4>
        <br>
        <h4>Pending Interviews</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>Ref.</th>
                <th>Vacancy</th>
                <th>Applicant</th>
                <th>Company</th>
                <th>Date</th>
                <th>Updated By</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($interviews as $interview)
                @if ($interview->date>=date('Y-m-d'))

                <tr>
                    <th><a href="{{route('interview.show',$interview->id)}}">
                        {{$interview->regNumber}}

                    </a>
                </th>
                    <th><a href="{{route('vacancy.show',$interview->vacancy_id)}}">
                        @if ($interview->vacancy)
                        {{$interview->vacancy->title->name}}
                        @else
                            Not Set Yet
                        @endif
                    </a>
                    </th>
                    <td> @if ($interview->applicant)
                        <a href="{{route('applicant.show',$interview->applicant->id)}}">
                            @if ($interview->applicant->image)
                        <img class="rounded-circle mr-2" width="30" src="{{ asset('storage/app/public/'.$interview->applicant->image) }}" alt="No Image">
                        @else
                        <img class="rounded-circle mr-2" width="30" src="{{ asset('public/img/no.png') }}" alt="No Image">
                        @endif
                        {{$interview->applicant->name}}
                        </a>
                        @else
                            Not Set Yet
                        @endif
                        </td>
                    <td>
                        @if ($interview->vacancy)
                        <a href="{{route('company.show',$interview->vacancy->company->id)}}">
                        {{$interview->vacancy->company->name}}
                        </a>
                        @else
                            Not Set Yet
                        @endif

                    </td>

                    <th>
                        {{date('d-M-Y',strtotime($interview->date))}}<br>
                        {{$interview->time}}
                    </th>
                    <td>
                        {{$interview->author}}<br>
                        {{$interview->updated_at->diffForHumans()}}
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
        <h4><button style="background-color:#0066ff ;" class="btn   text-white" onclick="show('operation1')"><i class="fas fa-user-tie"></i>Pending Interviews</button> <button style="background-color:#ff9933 ;" class="btn   text-white" onclick="show('operation2')"><i class="fas fa-user-tie"></i>Closed Interviews</button></h4>
        <br>
        <h4>Closed Interviews</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>Ref.</th>
                <th>Vacancy</th>
                <th>Applicant</th>
                <th>Company</th>
                <th>Date</th>
                <th>Updated By</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($interviews as $interview)
                @if ($interview->date<date('Y-m-d'))

                <tr>
                    <th><a href="{{route('interview.show',$interview->id)}}">
                        {{$interview->regNumber}}

                    </a>
                </th>
                    <th><a href="{{route('vacancy.show',$interview->vacancy_id)}}">
                        @if ($interview->vacancy)
                        {{$interview->vacancy->title->name}}
                        @else
                            Not Set Yet
                        @endif
                    </a>
                    </th>
                    <td> @if ($interview->applicant)
                        <a href="{{route('applicant.show',$interview->applicant->id)}}">
                            @if ($interview->applicant->image)
                        <img class="rounded-circle mr-2" width="30" src="{{ asset('storage/app/public/'.$interview->applicant->image) }}" alt="No Image">
                        @else
                        <img class="rounded-circle mr-2" width="30" src="{{ asset('public/img/no.png') }}" alt="No Image">
                        @endif
                        {{$interview->applicant->name}}
                        </a>
                        @else
                            Not Set Yet
                        @endif
                        </td>
                    <td>
                        @if ($interview->vacancy)
                        <a href="{{route('company.show',$interview->vacancy->company->id)}}">
                        {{$interview->vacancy->company->name}}
                        </a>
                        @else
                            Not Set Yet
                        @endif

                    </td>

                    <th>
                        {{date('d-M-Y',strtotime($interview->date))}}<br>
                        {{$interview->time}}
                    </th>
                    <td>
                        {{$interview->author}}<br>
                        {{$interview->updated_at->diffForHumans()}}
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
