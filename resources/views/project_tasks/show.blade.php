@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary mb-3" href="{{ route('projects.tasks.index', $project) }}">Task list</a>
    <div class="jumbotron text-center">
        <h2 class="card-title h2">{{ $task->title }}</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 pb-2">
            <p class="card-text">{{ $task->description }}</p>
            </div>
        </div>
        <hr class="my-4">
        <div class="d-flex justify-content-end">
            @isset($task->file_path)
            <a class="btn btn-success" href="{{ route('download', $task) }}">Download file</a>
            @endisset
            <a class="btn btn-warning" href="{{ route('projects.tasks.edit', [$project, $task]) }}">Edit</a>
            <form method="POST" action="{{ route('projects.tasks.destroy', [$project, $task]) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
