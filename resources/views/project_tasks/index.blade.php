@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
        <a href="{{ route('projects.tasks.create', $project) }}" class="btn btn-sm btn-primary" role="button">Add new task</a>
    </div>
    <ul class="nav nav-tabs mb-3" id="tabs-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="tabs-all-tab" data-toggle="pill" href="#tabs-all" role="tab" aria-controls="tabs-all" aria-selected="true">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tabs-new-tab" data-toggle="pill" href="#tabs-new" role="tab" aria-controls="tabs-new" aria-selected="false">New</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tabs-progress-tab" data-toggle="pill" href="#tabs-progress" role="tab" aria-controls="tabs-progress" aria-selected="false">In progress</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tabs-completed-tab" data-toggle="pill" href="#tabs-completed" role="tab" aria-controls="tabs-completed" aria-selected="false">Completed</a>
        </li>
    </ul>
    <div class="list-group">
        <div class="tab-content" id="tabs-tabContent">
            <div class="tab-pane fade show active" id="tabs-all" role="tabpanel" aria-labelledby="tabs-all-tab">
                @foreach($project->tasks as $task)
                <a href="{{ route('projects.tasks.show', [$project, $task]) }}" class="list-group-item list-group-item-action">{{ $task->title }}</a>
                @endforeach
            </div>
            <div class="tab-pane fade" id="tabs-new" role="tabpanel" aria-labelledby="tabs-new-tab">
                @isset($tasks['new'])
                @foreach($tasks['new'] as $task)
                <a href="{{ route('projects.tasks.show', [$project, $task]) }}" class="list-group-item list-group-item-action">{{ $task->title }}</a>
                @endforeach
                @endisset
            </div>
            <div class="tab-pane fade" id="tabs-progress" role="tabpanel" aria-labelledby="tabs-progress-tab">
                @isset($tasks['in_progress'])
                @foreach($tasks['in_progress'] as $task)
                <a href="{{ route('projects.tasks.show', [$project, $task]) }}" class="list-group-item list-group-item-action">{{ $task->title }}</a>
                @endforeach
                @endisset
            </div>
            <div class="tab-pane fade" id="tabs-completed" role="tabpanel" aria-labelledby="tabs-completed-tab">
                @isset($tasks['completed'])
                @foreach($tasks['completed'] as $task)
                <a href="{{ route('projects.tasks.show', [$project, $task]) }}" class="list-group-item list-group-item-action">{{ $task->title }}</a>
                @endforeach
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection
