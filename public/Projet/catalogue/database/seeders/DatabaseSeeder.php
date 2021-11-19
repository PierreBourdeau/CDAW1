<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
        DB::table('languages')->insert([
            'name' => 'french',
            'is_default' => 0,
            'rtl' => 0,
            'code' => 'fr'
        ]);
        //Create default basic app settings
        DB::table('basic_settings')->insert([
            'language_id' => $defaultLang,
            'website_title' => 'UV CDAW'
        ]);
        //Create default user : jdoe@email.com | password
        DB::table('users')->insert([
            'fname' => 'John',
            'lname' => 'Doe',
            'email' => 'jdoe@email.com',
            'birth' => '1980-01-01',
            'gender' => 'men',
            'username' => 'JohnDoe',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        //Create default admin : jbond@email.com | password
        DB::table('users')->insert([
            'fname' => 'James',
            'lname' => 'Bond',
            'email' => 'jbond@email.com',
            'birth' => '1975-01-01',
            'gender' => 'men',
            'username' => 'JBond007',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
