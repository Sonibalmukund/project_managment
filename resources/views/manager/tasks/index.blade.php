@extends('layouts.app')
@section('content')
<h1>Your Projects and Tasks</h1>
@foreach ($projects as $project)
  <h2>{{ $project->name }}</h2>
  <ul>
    @foreach ($project->tasks as $task)
      <li>{{ $task->title }} - {{ $task->status }}</li>
    @endforeach
  </ul>
@endforeach
@endsection