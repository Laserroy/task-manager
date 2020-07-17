<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    protected function setUp():void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    public function testProjectCreate()
    {
        $project = factory(Project::class)->make(['user_id' => $this->user->id]);
        $input = ['title' => $project->title];
        $response = $this->post(route('projects.store'), $input);

        $response->assertRedirect();
        $this->assertDatabaseHas('projects', ['title' => $project->title]);
    }

    public function testProjectDelete()
    {
        $project = factory(Project::class)->create(['user_id' => $this->user->id]);

        $this->assertDatabaseHas('projects', ['title' => $project->title]);

        $response = $this->delete(route('projects.destroy', $project));

        $response->assertRedirect();
        $this->assertDatabaseMissing('projects', ['title' => $project->title]);
    }
}
