<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'category_id' => rand(1, 5),
        'image' => '',
        'is_private' => rand(0, 1),
        'title' => $faker->sentence(rand(3, 5)),
        'spoiler' => $faker->sentence(rand(10, 30)),
        'text' => $faker->sentence(rand(100, 300))
    ];
});
