<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionLangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('permission_langs')->insert([
            'reference' => 'category',
            'description' => 'category permision',
            'permission_id' => 1,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'tag',
            'description' => 'tag permision',
            'permission_id' => 2,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'detail',
            'description' => 'detail permision',
            'permission_id' => 3,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'partner',
            'description' => 'partner permision',
            'permission_id' => 4,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'country',
            'description' => 'country permision',
            'permission_id' => 5,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'currency',
            'description' => 'currency permision',
            'permission_id' => 6,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'reason',
            'description' => 'reason permision',
            'permission_id' => 7,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'claim',
            'description' => 'claim permision',
            'permission_id' => 8,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'profile',
            'description' => 'profile permision',
            'permission_id' => 9,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'staff',
            'description' => 'staff permision',
            'permission_id' => 10,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'client',
            'description' => 'particularCostumer permision',
            'permission_id' => 11,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'business',
            'description' => 'businessCostumer permision',
            'permission_id' => 12,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'dashboard',
            'description' => 'dashboard permision',
            'permission_id' => 13,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'subject',
            'description' => 'subject permision',
            'permission_id' => 14,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'attribute',
            'description' => 'attribute permision',
            'permission_id' => 15,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'language',
            'description' => 'language permision',
            'permission_id' => 16,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'order',
            'description' => 'order permision',
            'permission_id' => 17,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'businesOrder',
            'description' => 'busines order permision',
            'permission_id' => 18,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'market',
            'description' => 'market permision',
            'permission_id' => 19,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'bill',
            'description' => 'bill permision',
            'permission_id' => 20,
            'lang_id' => 1,
        ]);
        DB::table('permission_langs')->insert([
            'reference' => 'request',
            'description' => 'request permision',
            'permission_id' => 21,
            'lang_id' => 1,
        ]);
    }
}
