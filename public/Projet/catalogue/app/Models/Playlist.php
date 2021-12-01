<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function medias() {
        return $this->belongsToMany('App\Models\Media');
    }
}
