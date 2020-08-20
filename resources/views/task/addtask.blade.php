@extends('task.layout');

@section('content')
    <div class="nav justify-content-between my-4">
       
        <h1>Add Notes</h1>
    <a href="{{url('/tasks')}}" class="btn  btn-danger">Back</a>
    </div>
    <hr>
<div class="card">
    <div class="card-body">
    <form action="{{url('insert/task/')}}" method="POST">
        @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" name="title" >
              @error('title')
              <strong class="text-danger">{{$message}}</strong>
              @enderror
            </div>
           
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <input type="text" class="form-control" name="description">
              @error('description')
              <strong class="text-danger">{{$message}}</strong>
              @enderror
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
  </div>
@endsection
