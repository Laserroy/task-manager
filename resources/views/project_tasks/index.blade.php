@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">All</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-new-tab" data-toggle="pill" href="#pills-new" role="tab" aria-controls="pills-new" aria-selected="false">New</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-progress-tab" data-toggle="pill" href="#pills-progress" role="tab" aria-controls="pills-progress" aria-selected="false">In progress</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-completed-tab" data-toggle="pill" href="#pills-completed" role="tab" aria-controls="pills-completed" aria-selected="false">Completed</a>
          </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
            @foreach($project->tasks as $task)
            <p>{{ $task->state }}</p>
            @endforeach
        </div>
        <div class="tab-pane fade" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">
            @isset($tasks['new'])
            @foreach($tasks['new'] as $task)
            <p>{{ $task->state }}</p>
            @endforeach
            @endisset
        </div>
        <div class="tab-pane fade" id="pills-progress" role="tabpanel" aria-labelledby="pills-progress-tab">
            @isset($tasks['in_progress'])
            @foreach($tasks['in_progress'] as $task)
            <p>{{ $task->state }}</p>
            @endforeach
            @endisset
        </div>
        <div class="tab-pane fade" id="pills-completed" role="tabpanel" aria-labelledby="pills-completed-tab">
            @isset($tasks['completed'])
            @foreach($tasks['completed'] as $task)
            <p>{{ $task->state }}</p>
            @endforeach
            @endisset
        </div>
      </div>
</div>

@endsection
