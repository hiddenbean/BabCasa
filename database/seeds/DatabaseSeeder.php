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
        $this->call(PartnerSeeder::class);
        $this->call(CodeCountrySeeder::class);
        $this->call(PhoneSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(DiscountSeeder::class);
        $this->call(DiscountLangSeeder::class);
    }
}
