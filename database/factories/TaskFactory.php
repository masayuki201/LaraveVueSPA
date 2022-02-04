<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title'            => $faker->dayOfWeek(),
        'content'          => $faker->realText(100, 2),
        'person_in_charge' => $faker->name,
        'created_at'       => $faker->dateTimeBetween('-2 years', '-1 years'),
        'updated_at'       => $faker->dateTimeBetween('-2 week', 'now'),
    ];
});
