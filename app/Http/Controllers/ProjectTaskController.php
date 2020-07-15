<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectTask;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $tasks = $project->tasks->groupBy('state');
        return view('project_tasks.index', compact('project', 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('project_tasks.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $title = $request->title;
        $description = $request->description;

        $newTask = $project->tasks()->create([
            'title' => $title,
            'description' => $description
        ]);

        if ($request->file) {
            $file = $request->file;
            $originName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public/' . $request->title, $originName);
            $newTask->update(['file_path' => $filePath]);
        }

        return redirect(route('projects.tasks.show', [$project, $newTask]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, ProjectTask $task)
    {
        return view('project_tasks.show', compact('project', 'task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, ProjectTask $task)
    {
        return view('project_tasks.edit', compact('project', 'task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, ProjectTask $task)
    {
        $title = $request->title;
        $description = $request->description;

        $project->tasks()->whereTitle($task->title)->update([
            'title' => $title,
            'description' => $description
        ]);

        if ($request->file) {
            $file = $request->file;
            $originName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public/' . $request->title, $originName);
            $project->tasks()->whereTitle($task->title)->update(['file_path' => $filePath]);
        }

        return redirect(route('projects.tasks.show', [$project, $task]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, ProjectTask $task)
    {
        $task->delete();

        return redirect(route('projects.tasks.index', $project));
    }
}
