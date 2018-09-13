<?php

use Faker\Generator as Faker;

$factory->define(App\Discount::class, function (Faker $faker) {
    return [
        'redaction_percentage' => '10',
        'start_at' => '2018-09-06',
        'end_at' => '2018-09-10',
        'partner_id' => '1',
    ];
});
