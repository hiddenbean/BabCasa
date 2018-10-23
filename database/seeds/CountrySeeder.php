<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'name' => 'Morocco',
            'alpha_2_code' => 'MA',
            'phone_code' => '+212',
            'currency' =>'mad',
            'currency_symbole' =>'$',
        ]);
    }
}
