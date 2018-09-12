<?php

use Faker\Generator as Faker;

$factory->define(App\DiscountLang::class, function (Faker $faker) {
    return [
        'reference' => 'discount',
        'description' => 'You better take it',
        'discount_id' => '1',
        'lang_id' => 1,

    ];
});
