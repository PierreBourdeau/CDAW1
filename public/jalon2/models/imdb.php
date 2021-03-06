<?php
include_once 'film.php';
class Imdb {

    public $url;
    public $contents;

    public function __construct($API_KEY) {
        $this->url = 'https://imdb-api.com/en/API/MostPopularMovies/'.$API_KEY;
    }

    function get10Films() {
        $filmsArray = array();
        $this->contents = file_get_contents($this->url); 
        $contents = json_decode($this->contents);

        for($i = 0; $i < 10; $i++) {
            $filmsArray[$i] = new Film($contents->items[$i]->title,$contents->items[$i]->year,$contents->items[$i]->image,$contents->items[$i]->id);
        }
        return $filmsArray;
    }
}
