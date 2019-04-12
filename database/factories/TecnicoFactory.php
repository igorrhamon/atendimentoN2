<?php

use App\Tecnico;
use Faker\Generator as Faker;

$factory->define(Tecnico::class, function (Faker $faker) {
    return [

        'user_id' => $faker->numberBetween(1,5),
        'status' => $faker->numberBetween(0,1),
        'location_id' => '2'
    ];
});
