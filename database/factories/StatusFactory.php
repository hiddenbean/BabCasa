<?php

use Faker\Generator as Faker;

$factory->define(App\Status::class, function (Faker $faker) {
    return [
        'is_approved' => '1',
        'partner_id' => '1',
        'staff_id' => 1,
    ];
});
