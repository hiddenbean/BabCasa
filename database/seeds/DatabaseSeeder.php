<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StaffSeeder::class);
        $this->call(LangSeeder::class);
        $this->call(ProfileSeeder::class);
        //$this->call(ProfileLangSeeder::class);
        $this->call(PartnerSeeder::class);
        //$this->call(PhoneSeeder::class);
        //$this->call(AddressSeeder::class);
        $this->call(DiscountSeeder::class);
        $this->call(DiscountLangSeeder::class);
    }
}
