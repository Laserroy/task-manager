@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('projects.create') }}" role="button" class="btn btn-primary float-right">Create new project
        </a>
    </div>
    <div class="list-group">
        @foreach($projects as $project)
        <a href="{{ route('projects.show', $project) }}" class="list-group-item list-group-item-action">{{ $project->title }}</a>
        @endforeach
    </div>
    {{ $projects->links() }}
</div>

@endsection
