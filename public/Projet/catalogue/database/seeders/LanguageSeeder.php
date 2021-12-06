<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create default english language
        $defaultLang = DB::table('languages')->insertGetId([
            'name' => "english",
            'is_default' => 1,
            'rtl' => 0,
            'code' => 'en'
        ]);
        //Create default french language
        $fr_lang = DB::table('languages')->insertGetId([
            'name' => 'french',
            'is_default' => 0,
            'rtl' => 0,
            'code' => 'fr'
        ]);

        $this->callWith(BasicSettingsSeeder::class, ['defaultLang' => $defaultLang, 'fr_lang' => $fr_lang]);
    }
}
