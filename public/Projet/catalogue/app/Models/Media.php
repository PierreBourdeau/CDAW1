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
        return $this->hasMany('App\Models\Tag');
    }
}
