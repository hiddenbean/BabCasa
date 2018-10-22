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
            'code_alpha' => 'MA',
            'code' => '+212',
            'currency_id' =>1,
        ]);
    }
}
