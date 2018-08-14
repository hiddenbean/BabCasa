<?php

use Faker\Generator as Faker;

$factory->define(App\CodeCountry::class, function (Faker $faker) {
    return [
        'code_country' => '1',
        'country' => 'Morocco',
    ];
});
