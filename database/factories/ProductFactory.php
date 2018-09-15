<?php

use Faker\Generator as Faker;

$factory->define(App\Prodcut::class, function (Faker $faker) {
    return [
        'price' => 100,
        'for_business' => 0,
        'currency_id' => 1,
        'quantity' => 10,
    ];
});
