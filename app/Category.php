<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_category');
    }
}
