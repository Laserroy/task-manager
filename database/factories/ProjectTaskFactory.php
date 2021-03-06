<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProjectTask;
use Faker\Generator as Faker;

$factory->define(ProjectTask::class, function (Faker $faker) {
    return [
        'title' =>  $faker->sentence($nbWords = 2),
        'description' => $faker->paragraph(3),
        'state' => $faker->randomElement(['new', 'in_progress', 'completed'])
    ];
});
