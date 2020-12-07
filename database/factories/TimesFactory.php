<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Times;
use App\Trainee;
use Faker\Generator as Faker;

$factory->define(Times::class, function (Faker $faker) {
    return [
        'trainee_id' => factory(Trainee::class),
        'laikas_nuo' => $faker->dateTimeInInterval($startDate = 'now', $interval = '+ 3 months', $timezone = null),
        'laikas_iki' => $faker->dateTimeInInterval($startDate = '+ 3 months', $interval = '+ 3 months', $timezone = null)
    ];
});
