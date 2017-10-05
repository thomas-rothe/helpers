<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
		'type' => $faker->numberBetween(0, 10),
		'to_pick_at' => $faker->dateTime(),
    ];
});
