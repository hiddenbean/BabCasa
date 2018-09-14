<?php

use Illuminate\Database\Seeder;

class ProfileLangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\ProfileLang', 2)->create();
    }
}
