<?php

use Faker\Generator as Faker;

$factory->define(App\Person::class, function (Faker $faker) {
    /*return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'city' => $faker->city,
    ];*/
    return [
        'user_id' => $faker->userName,
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $faker->password,
    //  'message' => $faker->sentence,
    //  'time' => $faker->dateTime,
    //  'done' => $faker->boolean,
    ];
});
