<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('pictures')->insert([
            'name' => 'PICTURE1',
            'tag' => "STAFF_avatar",
            'path' => 'images/partners/1010x54621x54c215v542g5445.png',
            'extension' => '.png',
            'pictureable_type' => 'staff',
            'pictureable_id' => 1,
    ]);
    }
}
