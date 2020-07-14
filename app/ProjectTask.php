<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    protected $attributes = [
        'state' => 'new'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
