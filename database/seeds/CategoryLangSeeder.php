<?php

use Illuminate\Database\Seeder;

class CategoryLangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_langs')->insert([
            'reference' => 'electronic',
            'description' => 'electronic',
            'category_id' => 1,
            'lang_id' => 1,
        ]);

        DB::table('category_langs')->insert([
            'reference' => 'electronique',
            'description' => 'electronique',
            'category_id' => 1,
            'lang_id' => 2,
        ]);

        DB::table('category_langs')->insert([
            'reference' => 'clothes',
            'description' => 'clothes',
            'category_id' => 2,
            'lang_id' => 1,
        ]);

        DB::table('category_langs')->insert([
            'reference' => 'vaitement',
            'description' => 'vaitement',
            'category_id' => 2,
            'lang_id' => 2,
        ]);
    }
}
