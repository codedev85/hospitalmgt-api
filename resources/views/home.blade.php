@extends('layouts.app')
<style>
    .prescription{
        color:white;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <a href='{{url('add/patient')}}' class='btn btn-success'>Add Patient</a> <a href='{{url("add/drug")}}' class='btn btn-success'>Add Drug</a>

<br><br><br><br>
                     <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Add Prescription</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $patient)
                          <tr>
                            <th scope="row">{{$patient->id}}</th>
                            <td>{{$patient->name}}</td>
                            <td>{{$patient->email}}</td>
                            <td><a href="{{url('add/prescription/'.$patient->id)}}" class="btn btn-success">Add Pescription</a></td>
                          </tr>
                          @endforeach

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
