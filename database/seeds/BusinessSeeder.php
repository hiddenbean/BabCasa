<?php

use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Business', 1)->create();

        DB::table('phones')->insert([
            'number' => '666666544',
            'type' => 'phone',
            'phoneable_id' => 1,
            'phoneable_type' => 'business',
            'country_id' => 1,
            'is_default' => true,
            'verify' => true,
            'tag' => 'admin'
        ]);
        DB::table('statuses')->insert([
            'is_approved' => false,
            'user_id' => 1,
            'user_type' => 'business',
            'staff_id' => 1
        ]);
        DB::table('addresses')->insert([
            'country_id' => '1',
            'city' => 'Témara',
            'address' => str_random(10),
            'address_two' => str_random(10),
            'full_name' => str_random(10),
            'zip_code' => '12345678',
            'is_default' => 1,
            'latitude' => '34.345678',
            'longitude' => '34.56789',
            'addressable_id' => 1,
            'addressable_type' => 'business'
        ]);
    }
}
