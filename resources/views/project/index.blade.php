@extends('layouts.app')

@section('content')
<div class="container">
    <div class="list-group">
        <p class="list-group-item list-group-item-action active">
          Projects:
        </p>
        @foreach($projects as $project)
        <a href="{{ route('projects.show', $project) }}" class="list-group-item list-group-item-action">{{ $project->title }}</a>
        @endforeach
    </div>
    {{ $projects->links() }}
</div>

@endsection
