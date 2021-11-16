<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $defaultLang = DB::table('languages')->insertGetId([
            'name' => "english",
            'is_default' => 1,
            'rtl' => 0,
            'code' => 'en'
        ]);
        DB::table('languages')->insert([
            'name' => 'french',
            'is_default' => 0,
            'rtl' => 0,
            'code' => 'fr'
        ]);
        DB::table('basic_settings')->insert([
            'language_id' => $defaultLang,
            'website_title' => 'UV CDAW'
        ]);
    }
}
