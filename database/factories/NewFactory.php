<?php

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->realText(),
        'supervisor_id' => '2'
    ];
});
