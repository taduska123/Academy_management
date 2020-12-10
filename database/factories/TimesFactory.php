<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Times;
use App\Trainee;
use Faker\Generator as Faker;

$factory->define(Times::class, function (Faker $faker) {
    return [
        'trainee_id' => factory(Trainee::class),
        'intership_day' => $faker->date(),
        'type_of_day' => $faker->name(),
        'time_to' => $faker->dateTimeInInterval($startDate = 'now', $interval = '+ 3 months', $timezone = null),
        'time_from' => $faker->dateTimeInInterval($startDate = '+ 3 months', $interval = '+ 3 months', $timezone = null)
    ];
});
