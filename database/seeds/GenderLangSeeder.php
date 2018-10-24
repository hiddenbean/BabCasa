<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GenderLangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gender_langs')->insert(['reference' => 'male','gender_id' => 1,'lang_id' => 1]);
        DB::table('gender_langs')->insert(['reference' => 'female','gender_id' => 2,'lang_id' => 1]);
    }
}
