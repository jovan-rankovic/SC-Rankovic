<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guarded = [];

    public function loginCheck($email, $passwd)
    {
        return User::where([
            'email' => $email,
            'password' => md5($passwd)
        ])->first();
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function payment()
    {
        return $this->hasMany('App\Payment');
    }
}
