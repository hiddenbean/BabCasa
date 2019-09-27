<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'name' => 'english',
            'alpha_2_code' => 'EN',
        ]);
        DB::table('languages')->insert([
            'name' => 'arabic',
            'alpha_2_code' => 'AR',
        ]);
        DB::table('languages')->insert([
            'name' => 'franch',
            'alpha_2_code' => 'FR',
        ]);
    }
}
