<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_profile')->insert([
            'profile_id' => 1,
            'permission_id' => 1,
            'can_read' => 1,
            'can_write' => 1,
        ]);
        DB::table('permission_profile')->insert([
            'profile_id' => 1,
            'permission_id' => 2,
            'can_read' => 1,
            'can_write' => 1,
        ]);
        DB::table('permission_profile')->insert([
            'profile_id' => 1,
            'permission_id' => 3,
            'can_read' => 1,
            'can_write' => 1,
        ]);
        DB::table('permission_profile')->insert([
            'profile_id' => 1,
            'permission_id' => 4,
            'can_read' => 1,
            'can_write' => 1,
        ]);
        DB::table('permission_profile')->insert([
            'profile_id' => 1,
            'permission_id' => 5,
            'can_read' => 1,
            'can_write' => 1,
        ]);
        DB::table('permission_profile')->insert([
            'profile_id' => 1,
            'permission_id' => 6,
            'can_read' => 1,
            'can_write' => 1,
        ]);
        DB::table('permission_profile')->insert([
            'profile_id' => 1,
            'permission_id' => 7,
            'can_read' => 1,
            'can_write' => 1,
        ]);
        DB::table('permission_profile')->insert([
            'profile_id' => 1,
            'permission_id' => 8,
            'can_read' => 1,
            'can_write' => 1,
        ]);
        DB::table('permission_profile')->insert([
            'profile_id' => 1,
            'permission_id' => 9,
            'can_read' => 1,
            'can_write' => 1,
        ]);
        DB::table('permission_profile')->insert([
            'profile_id' => 1,
            'permission_id' => 10,
            'can_read' => 1,
            'can_write' => 1,
        ]);
        DB::table('permission_profile')->insert([
            'profile_id' => 1,
            'permission_id' => 11,
            'can_read' => 1,
            'can_write' => 1,
        ]);
        DB::table('permission_profile')->insert([
            'profile_id' => 1,
            'permission_id' => 12,
            'can_read' => 1,
            'can_write' => 1,
        ]);
        DB::table('permission_profile')->insert([
            'profile_id' => 1,
            'permission_id' => 13,
            'can_read' => 1,
            'can_write' => 1,
        ]);
        DB::table('permission_profile')->insert([
            'profile_id' => 1,
            'permission_id' => 14,
            'can_read' => 1,
            'can_write' => 1,
        ]);
    }
}
