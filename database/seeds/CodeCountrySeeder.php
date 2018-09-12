<?php

use Illuminate\Database\Seeder;

class CodeCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\CodeCountry', 1)->create();
    }
}
