@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('projects.create') }}" role="button" class="btn btn-primary float-right">
            Create new project
        </a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Project</th>
            <th scope="col">Task count</th>
          </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
            <td>
                <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
            </td>
            <td>
                <span class="badge badge-pill badge-primary">{{ count($project->tasks) }}</span>
            </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    {{ $projects->links() }}
</div>

@endsection
