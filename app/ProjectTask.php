<?php

namespace App;

use Iben\Statable\Statable;
use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    use Statable;

    protected $fillable = ['title', 'description', 'file_path'];

    protected $attributes = [
        'state' => 'new'
    ];

    protected function getGraph()
    {
        return 'task_graph';
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
