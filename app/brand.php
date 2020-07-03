<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = "brands"; // chi dinh ten CSDL

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function category()
    {
    	return $this->belongTo('App\Category');
    }
}
