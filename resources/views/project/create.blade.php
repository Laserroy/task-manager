@extends('layouts.app')

@section('content')
<div class="container">
    <div class="list-group">
        <p class="list-group-item list-group-item-action active">
          Tasks:
        </p>
        @foreach($project->tasks as $task)
        <a href="{{ route('projects.tasks.index', $project) }}" class="list-group-item list-group-item-action">{{ $task->title }}</a>
        @endforeach
    </div>
</div>

@endsection
