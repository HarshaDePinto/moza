@extends('layouts.adstudent')





@section('content')

<section>


    <div class="container-fluid">
      <!-- Page Header-->

      <div class="row">

        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>All Subscribers</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Email</th>
                      <th>Date</th>


                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($subscribes as $sub)
                      @if ($sub->type=='Student')
                        <tr>
                            <td>{{$sub->email}}</td>
                            <td>{{$sub->updated_at->diffForHumans()}}</td>
                        </tr>
                      @else
                        <tr>
                            <td colspan="2" class="text-primary text-center">No Students Suscribed Yet...</td>
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
  </section>

@endsection


