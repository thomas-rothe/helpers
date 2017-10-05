<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
		'disposer_id' => 1,
		'type' => $faker->numberBetween(0, 10),
		'to_pick_at' => $faker->dateTime(),
    ];
});
