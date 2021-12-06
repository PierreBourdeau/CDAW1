<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BasicSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(int $defaultLang, int $fr_lang)
    {
        //Create default basic app settings
        DB::table('basic_settings')->insert([
            'language_id' => $defaultLang,
            'website_title' => 'UV CDAW'
        ]);
        DB::table('basic_settings')->insert([
            'language_id' => $fr_lang,
            'website_title' => 'UV CDAW'
        ]);
    }
}
