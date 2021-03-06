<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function plates()
    {
        return $this->belongsToMany('App\Plate');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
