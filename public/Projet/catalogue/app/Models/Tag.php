<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable =[
        'name'
    ];
    public function media(){
        return $this->belongsTo('App\Models\Media');
    }
}
