<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['id', 'name', 'is_default', 'code', 'rtl'];

    public function basic_setting() {
        return $this->hasOne('App\Models\BasicSetting');
    }

}
