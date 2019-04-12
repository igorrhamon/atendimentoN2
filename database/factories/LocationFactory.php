<?php

use App\Location;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'supervisor_id' => '2'
    ];
});
