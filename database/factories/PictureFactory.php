<?php

use Faker\Generator as Faker;

$factory->define(App\Picture::class, function (Faker $faker) {
    return [
        'name' => 'pic1',
        'path' => 'path/test',
        'extension' => '.png',
        'tag' => 'staff',
        'pictureable_id' => 1,
        'pictureable_type' => 'staff',
    ];
});
