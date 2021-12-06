<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'year',
        'image',
        'rating',
        'description',
        'creator',
    ];
    public function getMedia() {
        return $this->morphTo(__FUNCTION__, 'media_type', 'media_id');
    }
    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
    
    public function playlists() {
        return $this->belongsToMany('App\Models\Playlist');
    }
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
    public function liked() {
        return $this->hasMany('App\Models\Like');
    }
    public function seen() {
        return $this->hasMany('App\Models\Seen');
    }
}
