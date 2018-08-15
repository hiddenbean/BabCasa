<?php

use Faker\Generator as Faker;

$factory->define(App\Partner::class, function (Faker $faker) {
    return [
        'email' => 'partner@gmail.com',
        'password' => '$2y$10$FqpnKGwqc31TocNVFC4JyOhfCPrwp4tZtyNFA96sV7uTJPPo32rbq', //123456
        'name' => str_random(10),
        'company_name' => str_random(10),
        'about' => str_random(50),
        'trade_registry' => str_random(10),
        'ice' => str_random(10),
        'taxe_id' => str_random(10),
    ];
});
