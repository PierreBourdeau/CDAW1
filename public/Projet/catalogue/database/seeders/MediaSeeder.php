<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Populate database with ImDB datas - InTheater API
        $api_result = file_get_contents('https://imdb-api.com/en/API/InTheaters/k_rapxhaf0'); 
        $contents = json_decode($api_result);

        foreach($contents->items as $key=>$content) {

            //add a movie and it's associated media
            $movie = new \App\Models\Movie;
            $movie->length = $content->runtimeStr;
            $movie->cast = $content->stars;
            $movie->save();
            $image = pathinfo($content->image)['basename'];
            $media = $movie->media()->create([
                'title' => $content->title,
                'year' => $content->year,
                'image' => $image,
                'creator' => $content->directors,
                'description' => $content->plot,
            ]);
            foreach($content->genreList as $tag) {
                $tag = \App\Models\Tag::firstOrCreate([
                'name' => $tag->value,
                ]);
                $media->tags()->attach($tag);
            }
            file_put_contents('public/front/img/media/'.$image, file_get_contents($content->image));
        }

        //Populate database with ImDB datas - MostPopularTVs API
        $api_result = file_get_contents('https://imdb-api.com/en/API/MostPopularTVs/k_rapxhaf0'); 
        $contents = json_decode($api_result);
        foreach($contents->items as $key=>$content) {

            //add a serie and it's associated media
            $serie = new \App\Models\Serie;
            $serie->seasons = rand(1,7);
            $serie->cast = $content->crew;
            $serie->save();
            $image = pathinfo($content->image)['basename'];
            $media = $serie->media()->create([
                'title' => $content->title,
                'year' => $content->year,
                'image' => $image,
            ]);
            $tag = DB::table('tags')->inRandomOrder()->first();
            $media->tags()->attach($tag->id);
            file_put_contents('public/front/img/media/'.$image, file_get_contents($content->image));
        }

    }
}
