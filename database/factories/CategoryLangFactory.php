<?php

use Faker\Generator as Faker;

$factory->define(App\CategoryLang::class, function (Faker $faker) {
    return [
        'reference' => str_random(10),
        'decription' => str_random(100),
        'categorie_id' => 1,
        'lang_id' => 1,
    ];
});
