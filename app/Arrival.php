<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrival extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function training()
    {
        return $this->belongsTo('App\Training');
    }

    public function trainer()
    {
        return $this->belongsTo('App\Trainer');
    }

    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }
}
