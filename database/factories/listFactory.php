<?php

use Faker\Generator as Faker;

$factory->define(App\lists::class, function (Faker $faker) {
    return [
        'message' => $faker->sentence,
        'time' => $faker->dateTime,
        'user_id' => $faker->userName,
        'done' => $faker->boolean,
    ];
});
