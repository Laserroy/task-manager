@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pb-3">
        <a class="display-4" href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
        <a href="{{ route('projects.tasks.create', $project) }}" class="btn btn-primary float-right" role="button">Add new task</a>
    </div>
    <form method="GET" action="{{ route('projects.tasks.index', $project) }}">
        @csrf
        <div class="input-group mb-3">
            <select class="custom-select" name="filter" id="inputGroupSelect">
                <option value="" selected>All</option>
                <option value="new">New</option>
                <option value="in_progress">In progress</option>
                <option value="completed">Completed</option>
            </select>
            <div class="input-group-append">
                <button type="submit" class="btn btn-secondary float-right">Filter</button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Task</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>
                    <a href="{{ route('projects.tasks.show', [$project, $task]) }}" class="">
                        {{ $task->title }}
                    </a>
                </td>
                @switch($task->state)
                        @case('new')
                            <td>
                                <span class="badge badge-pill badge-success">new</span>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('change_status', [$project, $task]) }}">
                                    @csrf
                                    <button type="submit"
                                            class="btn btn-outline-primary float-right"
                                            onclick="return confirm('Take to work?')">
                                        Accept
                                    </button>
                                </form>
                            </td>
                            @break
                        @case('in_progress')
                            <td>
                                <span class="badge badge-pill badge-warning">in progress</span>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('change_status', [$project, $task]) }}">
                                    @csrf
                                    <button type="submit"
                                            class="btn btn-outline-success float-right"
                                            onclick="return confirm('Finish task?')">
                                        Finish
                                    </button>
                                </form>
                            </td>
                            @break
                        @case('completed')
                            <td>
                                <span class="badge badge-pill badge-secondary">completed</span>
                            </td>
                            <td></td>
                            @break
                        @endswitch
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
