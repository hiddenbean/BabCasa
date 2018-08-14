<?php

use Faker\Generator as Faker;

$factory->define(App\Phone::class, function (Faker $faker) {
    return [
        'number' => '0610256365',
        'type' => 'fix',
        'phoneable_id' => 1,
        'phoneable_type' => 'partner',
        'code_country' => 1,
    ];
});
