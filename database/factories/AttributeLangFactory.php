<?php

use Faker\Generator as Faker;

$factory->define(App\AttributeLang::class, function (Faker $faker) {
    return [
        'reference' => str_random(10),
        'description' => str_random(100),
        'category_id' => 1,
    ];
});
