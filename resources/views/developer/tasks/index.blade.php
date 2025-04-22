@extends('layouts.app')
@section('content')
<h1>Your Assigned Tasks</h1>
<table>
  <thead>
    <tr>
      <th>Title</th>
      <th>Status</th>
      <th>Update</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($tasks as $task)
    <tr>
      <td>{{ $task->title }}</td>
      <td>{{ $task->status }}</td>
      <td>
        <form action="{{ url('developer/tasks/'.$task->id) }}" method="POST">
          @csrf
          @method('PATCH')
          <select name="status">
            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
          </select>
          <button type="submit">Update</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection