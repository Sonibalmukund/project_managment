@extends('layouts.app')
@section('content')
<h1>Create Task</h1>
<form action="{{ route('tasks.store') }}" method="POST">
  @csrf
  <input type="text" name="title" placeholder="Task Title" required>
  <textarea name="description" placeholder="Task Description"></textarea>
  <select name="project_id" required>
    <option value="">Select Project</option>
    @foreach ($projects as $project)
      <option value="{{ $project->id }}">{{ $project->name }}</option>
    @endforeach
  </select>
  <select name="developer_id" required>
    <option value="">Select Developer</option>
    @foreach ($developers as $developer)
      <option value="{{ $developer->id }}">{{ $developer->name }}</option>
    @endforeach
  </select>
  <button type="submit">Assign Task</button>
</form>
@endsection