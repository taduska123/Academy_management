<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Time;
use App\Trainee;
use Faker\Generator as Faker;

$factory->define(Time::class, function (Faker $faker) {
    return [
        'trainee_id' => factory(Trainee::class),
        'intership_day' => '2021-01-14',
        'type_of_time' => $faker->name(),
        'time_to' => $faker->time($format = 'H:i'),
        'time_from' => $faker->time($format = 'H:i')
    ];
});