<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, static function (Faker $faker) {
    return [
        'name' => $faker->words(3, true),
        'description' => $faker->paragraph,
    ];
});
