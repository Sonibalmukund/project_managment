@extends('layouts.app')
@section('content')
<h1>All Projects</h1>
<a href="{{ route('projects.create') }}">Create New Project</a>
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Manager</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($projects as $project)
    <tr>
      <td>{{ $project->name }}</td>
      <td>{{ $project->manager->name }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection