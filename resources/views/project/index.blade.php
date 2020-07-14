@extends('layouts.app')

@section('content')
<div class="container">
        @foreach($projects as $project)
        <p>{{ $project->name }}</p>
        @endforeach
        {{ $projects->links() }}
</div>

@endsection
