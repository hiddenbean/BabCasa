<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'parent_id' => 1,
        'picture_id' => 1,
    ];
});
