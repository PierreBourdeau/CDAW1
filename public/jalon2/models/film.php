<?php
class Film {

    public $title;
    public $year;
    public $image;
    public $id;
    
    public function __construct($title, $year, $image, $id) {
        $this->title = $title;
        $this->year =  $year;
        $this->image = $image;
        $this->id = $id;
    }


    function setTitle($title) {
        $this->title = $title;
    }
    function getTitle() {
        return $this->title;
    }

    function setYear($year) {
        $this->year = $year;
    }
    function getYear() {
        return $this->year;
    }
   
    function setImage($image) {
        $this->image = $image;
    }
    function getImage() {
        return $this->image;
    }

    function setId($id) {
        $this->id = $id;
    }
    function getId() {
        return $this->id;
    }
}
