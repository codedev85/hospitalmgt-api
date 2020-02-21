
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Patient</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{url('post/patient')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="FullName">

                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" name="number" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                          </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Phone Number</label>
                          <input  class="form-control" name="number" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone Number">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Address</label>
                          <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Address">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
