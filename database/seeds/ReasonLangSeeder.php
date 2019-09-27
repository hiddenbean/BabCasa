<?php

use Illuminate\Database\Seeder;

class ReasonLangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\ReasonLang', 1)->create();
    }
}
