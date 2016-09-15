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

$factory->define(codecommerce\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(codecommerce\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->sentence()
    ];
});

$factory->define(codecommerce\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->sentence(),
        'price' => $faker->randomFloat(2),
        'category_id' => $faker->numberBetween(1,10),
        'recommend' => $faker->numberBetween(0,1),
        'featured' => $faker->numberBetween(0,1)
    ];
});