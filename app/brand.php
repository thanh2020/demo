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

    protected $active = [
    	1 => [
    		'name' => 'public',
    		'class' => 'btn btn-info'
    	],
    	0 => [
    		'name' => 'private',
    		'class' => 'btn btn-danger'
    	]
    ];

    public function bran(){
    	return array_get($this->active,$this->is_active);
    }
}
