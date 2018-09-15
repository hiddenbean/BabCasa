<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\ProfileLang::class, function (Faker $faker) {
    return [
        'referene' =>  $faker->randomElement($array = array ('editor','markter')),
        'description' => $faker->text,
        'profile_id' => 1, 
        'lang_id' => 1, 
        
    ];
});
