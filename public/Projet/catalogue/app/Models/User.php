<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'email';
    public $incrementing = false; //prevent primary key to auto update

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'birth',
        'photo',
        'username',
        'password',
        'country',
    ];

    public function playlists() {
        return $this->hasMany('App\Models\Playlist');
    }

    public function liked() {
        return $this->hasMany('App\Models\Like');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    public function seen() {
        return $this->hasMany('App\Models\Seen');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth' => 'date',
    ];
}
