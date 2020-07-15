@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <a href="{{ asset($task->file_path) }}">File</a>
    <div class="btn-group" role="group">
        <a href="{{ route('projects.tasks.edit', [$project, $task]) }}" class="btn btn-warning" role="button">Edit</a>
        <form method="POST" action="{{ route('projects.tasks.destroy', [$project, $task]) }}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
</div>
@endsection
