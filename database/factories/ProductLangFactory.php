<?php

use Faker\Generator as Faker;

$factory->define(App\ProductLang::class, function (Faker $faker) {
    return [
        'reference' => str_random(10),
        'description' => str_random(100),
        'short_description' => str_random(10),
        'product_id' => 1,
        'lang_id' => 1,
    ];
});
