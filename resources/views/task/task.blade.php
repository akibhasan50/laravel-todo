@extends('task.layout');

@section('content')
    <div class="nav justify-content-between my-4">
       
        <h1> Notes</h1>
    <a href="{{url('add/task')}}" class="btn btn-outline-warning">Add Task</a>
    </div>
    <hr>
  @foreach ($showtask as $item)
 @if ($item->status == 0)
    <div class="card my-4 bg-warning">
      <div class="card-body">
      <h5 class="card-title">{{$item->title}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$item->created_at}}</h6>
        <p class="card-text">{{$item->description}}</p>
        <a href="{{url('/tasks/status/'.$item->id)}}" class="btn btn-primary">complete</a>
      <a href="{{url('edit/task/'.$item->id)}}" class="btn btn-success">Edit</a>
        <a href="{{url('delete/task/'.$item->id)}}" class="btn btn-danger">Delete</a>
      </div>

</div> 
 @else
 <div class="card my-4 bg-info">
  <div class="card-body">
  <h5 class="card-title">{{$item->title}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{$item->created_at}}</h6>
    <p class="card-text">{{$item->description}}</p>
    <a href="{{url('/tasks/status/'.$item->id)}}" class="btn btn-secondary">Done</a>
  <a href="{{url('edit/task/'.$item->id)}}" class="btn btn-success">Edit</a>
    <a href="{{url('delete/task/'.$item->id)}}" class="btn btn-danger">Delete</a>
  </div>

</div>  
 @endif
 
  @endforeach
@endsection
