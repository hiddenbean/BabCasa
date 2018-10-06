<?php

use Faker\Generator as Faker;

$factory->define(App\Reason::class, function (Faker $faker) {
    return [
        'reference' => 'All good',
    ];
});
