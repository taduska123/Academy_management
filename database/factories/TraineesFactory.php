<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Trainee;
use App\User;
use Faker\Generator as Faker;

$factory->define(Trainee::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'tel' => $faker->phoneNumber,
        'position' => $faker->jobTitle,
        'contract_start' => $faker->date(),
        'contract_end' => $faker->date()
    ];
});
