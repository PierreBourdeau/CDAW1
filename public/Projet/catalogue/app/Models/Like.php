<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'media_id'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function media() {
        return $this->belongsTo('App\Models\Media');
    }
}
