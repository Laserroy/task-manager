@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form" method="POST" action="{{ route('projects.tasks.update', [$project, $task]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="formTitle">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $task->title }}" id="formTitle" aria-describedby="titleHelp">
          </div>
          <div class="form-group">
            <label for="taskDescription">Description:</label>
            <textarea class="form-control" name="description" id="taskDescription" rows="5">{{ $task->description }}</textarea>
          </div>
        @if(!$task->file_path)
        <div class="form-group">
            <label for="FormControlFile">Select image or document</label>
            <input type="file" name="file" class="form-control-file" id="FormControlFile">
        </div>
        @endif
        <button type="submit" class="btn btn-primary float-right">Save</button>
    </form>
</div>
@endsection
