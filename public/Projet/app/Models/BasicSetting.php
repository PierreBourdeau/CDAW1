<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasicSetting extends Model
{
    public $timestamps = false;

    protected $fillable = [
        "language_id",
        "website_title",
       ];

    public function language() {
        return $this->belongsTo('App\Models\Language');
    }


}
