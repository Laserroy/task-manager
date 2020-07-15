@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form" method="POST" action="{{ route('projects.store') }}">
        @csrf
        <div class="form-group">
            <label for="formTitle">Title:</label>
            <input type="text" name="title" class="form-control" id="formTitle" aria-describedby="titleHelp">
          </div>
        <button type="submit" class="btn btn-primary float-right">Create</button>
    </form>
</div>
@endsection
