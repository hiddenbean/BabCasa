<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'is_approved' => '1',
            'user_id' => '1',
            'user_type' => 'partner',
            'staff_id' => 1,
    ]);
    }
}
