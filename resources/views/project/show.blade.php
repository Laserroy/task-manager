@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron text-center">
        <h2 class="card-title h2">{{ $project->title }}</h2>
        <hr class="my-4">
        <div class="d-flex justify-content-end">
            <a class="btn btn-primary" href="{{ route('projects.tasks.index', $project) }}">Go to tasks</a>
            <form method="POST" action="{{ route('projects.destroy', $project) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                    Delete project
                </button>
            </form>
        </div>
      </div>
</div>
@endsection
