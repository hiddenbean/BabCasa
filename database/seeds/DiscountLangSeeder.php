<?php

use Illuminate\Database\Seeder;

class DiscountLangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\DiscountLang', 1)->create();
    }
}
