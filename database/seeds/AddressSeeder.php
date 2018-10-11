<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'country_id' => '1',
            'city' => 'Témara',
            'address' => str_random(10),
            'address_two' => str_random(10),
            'full_name' => str_random(10),
            'zip_code' => '12345678',
            'latitude' => '34.345678',
            'longitude' => '34.56789',
            'addressable_id' => '1',
            'addressable_type' => 'staff',
        ]);
        DB::table('addresses')->insert([
            'country_id' => '1',
            'city' => 'Témara',
            'address' => str_random(10),
            'address_two' => str_random(10),
            'full_name' => str_random(10),
            'zip_code' => '12345678',
            'latitude' => '34.345678',
            'longitude' => '34.56789',
            'addressable_id' => '1',
            'addressable_type' => 'partner',
        ]);
    }
}
