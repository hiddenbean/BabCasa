<?php

use Faker\Generator as Faker;

$factory->define(App\AttributeValue::class, function (Faker $faker) {
    return [
        'quantity' => 10,
        'currency_id' => 1,
        'price' => 100,
        'product_id' => 1,
        'attribute_id' => 1,
        'attribute_value_id' => 1,
    ];
});
