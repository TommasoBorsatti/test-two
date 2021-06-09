<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function guest()
    {
        return $this->belongsTo('App\Guest');
    }
}
