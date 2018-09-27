<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('permissions')->insert([
            'type' => 'category',
        ]);
        DB::table('permissions')->insert([
            'type' => 'tag',
        ]);
        DB::table('permissions')->insert([
            'type' => 'detail',
        ]);
        DB::table('permissions')->insert([
            'type' => 'partner',
        ]);
        DB::table('permissions')->insert([
            'type' => 'country',
        ]);
        DB::table('permissions')->insert([
            'type' => 'currency',
        ]);
        DB::table('permissions')->insert([
            'type' => 'reason',
        ]);
        DB::table('permissions')->insert([
            'type' => 'claim',
        ]);
        DB::table('permissions')->insert([
            'type' => 'profile',
        ]);
        DB::table('permissions')->insert([
            'type' => 'sraff',
        ]);
        DB::table('permissions')->insert([
            'type' => 'particularCostumer',
        ]);
        DB::table('permissions')->insert([
            'type' => 'businessCostumer',
        ]);
        DB::table('permissions')->insert([
            'type' => 'dashboard',
        ]);


    }
}
