<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Project::class, 50)->create()->each(function ($project) {
            $project->tasks()->saveMany(factory(App\ProjectTask::class, 5)->make());
        });
    }
}
