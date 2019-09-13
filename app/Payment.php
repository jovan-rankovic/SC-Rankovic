<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function price()
    {
        return $this->belongsTo('App\Price');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function operator()
    {
        return $this->belongsTo('App\User')->where('role_id', 1)->orWhere('role_id', 3);
    }

    public function arrivals()
    {
        return $this->hasMany('App\Arrival');
    }
}
