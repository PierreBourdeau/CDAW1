<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create default user : jdoe@email.com | password
        DB::table('users')->insert([
            'fname' => 'John',
            'lname' => 'Doe',
            'email' => 'jdoe@email.com',
            'birth' => '1980-01-01',
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
            'username' => 'JBond007',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
