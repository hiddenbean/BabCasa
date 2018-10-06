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
        $this->call(CountrySeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(ProfileLangSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(PermissionLangSeeder::class);
        $this->call(PermissionProfileSeeder::class);
        $this->call(PictureSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(DiscountSeeder::class);
        $this->call(DiscountLangSeeder::class);
    }
}
