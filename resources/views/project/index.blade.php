@extends('layouts.app')

@section('content')
<div class="container">
        @foreach($projects as $project)
        <p>{{ $project->title }}</p>
        @endforeach
        {{ $projects->links() }}
</div>

@endsection
