<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('phones')->insert([
            'number' => '610256365',
            'type' => 'phone',
            'phoneable_id' => 1,
            'phoneable_type' => 'partner',
            'country_id' => 1,
            'is_default' => true,
            'verify' => true,
            'tag' => 'admin'
        ]);
        DB::table('phones')->insert([
            'number' => '621365921',
            'type' => 'fix',
            'phoneable_id' => 1,
            'phoneable_type' => 'staff',
            'country_id' => 1,
            'is_default' => true,
            'verify' => true,
            'tag' => 'company'
        ]);
    }
}
