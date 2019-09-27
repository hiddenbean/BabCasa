<?php

use Faker\Generator as Faker;

$factory->define(App\ReasonLang::class, function (Faker $faker) {
    return [
        'short_description' => 'all the informations are available',
        'description' => 'all the required fields are available',
        'reason_id' => 1,
        'lang_id' => 1,
    ];
});
