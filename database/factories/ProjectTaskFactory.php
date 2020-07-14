<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProjectTask;
use Faker\Generator as Faker;

$factory->define(ProjectTask::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'description' => $faker->paragraph(3)
    ];
});
