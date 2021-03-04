<?php

use Faker\Generator as Faker;

$factory->define(App\SubcategoryQuestion::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1, 5),
        'title' => $faker->sentence,
        'description' => $faker->text(200),
        'url' => $faker->slug,
        'status' => 1,
    ];
});
