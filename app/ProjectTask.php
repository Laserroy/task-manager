<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    protected $fillable = ['title', 'description', 'file_path'];

    protected $attributes = [
        'state' => 'new'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
