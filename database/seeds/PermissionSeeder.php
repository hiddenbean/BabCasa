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
            'type' => 'staff',
        ]);
        DB::table('permissions')->insert([
            'type' => 'client',
        ]);
        DB::table('permissions')->insert([
            'type' => 'business',
        ]);
        DB::table('permissions')->insert([
            'type' => 'dashboard',
            ]);
        DB::table('permissions')->insert([
            'type' => 'subject',
        ]);
        DB::table('permissions')->insert([
            'type' => 'attribute',
        ]);
        DB::table('permissions')->insert([
            'type' => 'language',
        ]);
        DB::table('permissions')->insert([
            'type' => 'order',
        ]);
        DB::table('permissions')->insert([
            'type' => 'businesOrder',
        ]);
        DB::table('permissions')->insert([
            'type' => 'market',
        ]);
        DB::table('permissions')->insert([
            'type' => 'bill',
        ]);
        DB::table('permissions')->insert([
            'type' => 'request',
        ]);
        DB::table('permissions')->insert([
            'type' => 'condition',
        ]);


    }
}
