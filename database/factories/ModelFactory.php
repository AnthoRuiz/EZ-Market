<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(market\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(market\Product::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->name,
        'description' => $faker->text(40),
        'price'       => $faker->randomFloat(3,10,1000),
        'img'         => $faker->imageUrl(200, 200, 'food', true, 'Faker'),
    ];
});

$factory->define(market\Category::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->name,
        'description' => $faker->text(40),
    ];
});