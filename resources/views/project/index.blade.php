@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('projects.create') }}" role="button" class="btn btn-primary">
        Create new project
    </a>
    <div class="list-group">
        @foreach($projects as $project)
        <a href="{{ route('projects.show', $project) }}" class="list-group-item list-group-item-action">{{ $project->title }}</a>
        @endforeach
    </div>
    {{ $projects->links() }}
</div>

@endsection
