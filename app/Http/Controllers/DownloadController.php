<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectTask;

class DownloadController extends Controller
{
    public function __invoke(ProjectTask $task)
    {
        return response()->download($task->file_path);
    }
}
