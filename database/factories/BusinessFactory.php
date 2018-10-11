<?php

use Faker\Generator as Faker;

$factory->define(App\Business::class, function (Faker $faker) {
    return [
        'email' =>  $faker->unique()->safeEmail,
        'password' => '$2y$10$FqpnKGwqc31TocNVFC4JyOhfCPrwp4tZtyNFA96sV7uTJPPo32rbq', //123456
        'name' => str_random(10),
        'company_name' => str_random(10),
        'about' => str_random(50),
        'trade_registry' => str_random(10),
        'ice' => str_random(10),
        'is_register_to_newsletter' => 1,
        'taxe_id' => str_random(10),
    ];
});
