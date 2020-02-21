
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Prescription</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{url('post/prescription')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                        <input type="text"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="FullName" value="{{ $patient->name }}" disabled>
                       <input type="hidden" name='name' value="{{$patient->id}}"/>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Ailment</label>
                            <input type="text" name="ailment" class="form-control" name="number" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ailment">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your ailment with anyone else.</small>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Drugs</label>
                          <select class="form-control" name="drugs">
                            <option >Add Drug</option>
                              @foreach($drugs as $drug)
                              <option value='{{$drug->id}}'>{{$drug->name}}</option>
                              @endforeach
                          </select>
                          </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
