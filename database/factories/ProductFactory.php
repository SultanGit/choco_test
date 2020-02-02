<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'color' => $faker->colorName,
        'weight' => $faker->randomFloat(2, 1, 10000),
        'price' => $faker->randomFloat(2, 1, 10000),
        'tags' => $faker->words(),
    ];
});
