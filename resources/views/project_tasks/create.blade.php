@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form" method="POST" action="{{ route('projects.tasks.store', $project) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="formTitle">Title:</label>
            <input type="text" name="title" class="form-control" id="formTitle" aria-describedby="titleHelp">
          </div>
          <div class="form-group">
            <label for="descript">Description:</label>
            <textarea class="form-control" name="description" id="description" rows="5"></textarea>
          </div>
        <div class="form-group">
            <label for="FormControlFile">Select image or document</label>
            <input type="file" name="file" class="form-control-file" id="FormControlFile">
        </div>
        <button type="submit" class="btn btn-primary float-right">Create</button>
    </form>
</div>
@endsection
