<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seen extends Model
{
    use HasFactory;
    protected $table = 'seen';
    protected $fillable = [
        'date',
        'media_id',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function media() {
        return $this->belongsTo('App\Models\Media');
    }
}
