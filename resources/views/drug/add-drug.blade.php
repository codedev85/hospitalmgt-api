
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Drug</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{url('post/drug')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Drug Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Drug Name">

                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Drug Count</label>
                            <input type="number" class="form-control" name="drug_count" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Drug Count">
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                          </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
