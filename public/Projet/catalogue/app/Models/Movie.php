<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'length',
        'cast',
    ];
    public function media(){
        return $this->morphOne('App\Models\Media', 'media');
    }
}
