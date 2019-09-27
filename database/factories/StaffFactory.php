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

$factory->define(App\Staff::class, function (Faker $faker) {
    return [
        'name' =>  $faker->unique()->word,
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'profile_id' => 1,
        'email' => 'staff@babcasa.com',
        'password' =>  '$2y$10$MwCBUoznXI9cK9qYIh8HMeNTRTkGW26X0ZPpW5QF9ZEOrKZAXLOvm', // 123456
        'birthday' => $faker->dateTime,
        'gender_id' => $faker->randomElement($array = array (1,2)),
        
    ];
});
