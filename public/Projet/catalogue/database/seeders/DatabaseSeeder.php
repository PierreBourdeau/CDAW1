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
        //Populate database with ImDB datas - InTheater API
        $api_result = file_get_contents('https://imdb-api.com/en/API/InTheaters/k_rapxhaf0'); 
        $contents = json_decode($api_result);

        for($i = 0; $i < 5; $i++) {

            //add a movie and it's associated media
            $movie = new \App\Models\Movie;
            $movie->length = $contents->items[$i]->runtimeStr;
            $movie->cast = $contents->items[$i]->stars;
            $movie->save();
            $image = pathinfo($contents->items[$i]->image)['basename'];
            $movie->media()->create([
                'title' => $contents->items[$i]->title,
                'year' => $contents->items[$i]->year,
                'image' => $image,
                'creator' => $contents->items[$i]->directors,
                'description' => $contents->items[$i]->plot,
            ]);
            file_put_contents('public/front/img/media/'.$image, file_get_contents($contents->items[$i]->image));
        }
    }
}
