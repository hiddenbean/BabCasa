<?php

use Faker\Generator as Faker;

$factory->define(App\Partner::class, function (Faker $faker) {
    return [
        'email' =>  $faker->unique()->safeEmail,
        'password' => '$2y$10$FqpnKGwqc31TocNVFC4JyOhfCPrwp4tZtyNFA96sV7uTJPPo32rbq', //123456
        'name' => str_random(10),
        'company_name' => str_random(10),
        'about' => str_random(50),
        'taxe_id' => str_random(10),
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'admin_email' => $faker->unique()->safeEmail,
    ];
});
