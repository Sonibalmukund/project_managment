@extends('layouts.app')
@section('content')
<h1>Create Project</h1>
<form action="{{ route('projects.store') }}" method="POST">
  @csrf
  <input type="text" name="name" placeholder="Project Name" required>
  <textarea name="description" placeholder="Project Description"></textarea>
  <select name="manager_id" required>
    <option value="">Select Manager</option>
    @foreach ($managers as $manager)
      <option value="{{ $manager->id }}">{{ $manager->name }}</option>
    @endforeach
  </select>
  <button type="submit">Create</button>
</form>
@endsection