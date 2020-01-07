<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductProperty;
use Faker\Generator as Faker;

$factory->define(ProductProperty::class, static function (Faker $faker) {
    return [
        'price' => random_int(1, 100) * 1000,
        'color' => $faker->unique(true)->randomElement(['red', 'blue', 'yellow', 'pink', 'black', 'white', 'brown', 'teal']),
    ];
});
