<?php

use App\HardDrive;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(HardDrive::class, function (Faker $faker) {
    return [
        'endLog' => $faker->numberBetween(0,5),
        'modelo' => 'Samsung'
    ];
});
