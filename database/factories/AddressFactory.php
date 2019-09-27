<?php

use Faker\Generator as Faker;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
        'country_id' => '1',
        'city' => 'Témara',
        'address' => str_random(10),
        'address_two' => str_random(10),
        'full_name' => str_random(10),
        'zip_code' => '12345678',
        'is_default' => 1,
        'latitude' => '34.345678',
        'longitude' => '34.56789',
        'addressable_id' => '1',
        'addressable_type' => 'staff',
    ];
});
