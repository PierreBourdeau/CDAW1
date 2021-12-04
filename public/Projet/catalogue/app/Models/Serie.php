<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $fillable = [
        'seasons',
        'cast',
    ];
    public function media(){
        return $this->morphOne('App\Models\Media', 'media');
    }
}
