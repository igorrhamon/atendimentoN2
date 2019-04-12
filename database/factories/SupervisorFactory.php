<?php

use App\Supervisor;
use Faker\Generator as Faker;

$factory->define(Supervisor::class, function (Faker $faker) {
    return [
        'user_id' => '1'
    ];
});
