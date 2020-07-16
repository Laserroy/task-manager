@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
