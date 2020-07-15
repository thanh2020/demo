<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products"; // chi dinh ten CSDL
    protected $fillable = ['views'];

    public function category()
    {
    	return $this->belongTo('App\Category');
    }

    public function brand()
    {
    	return $this->belongTo('App\brand');
    }
}
