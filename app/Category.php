<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories"; //tùy chỉnh tên bảng trong csdl

    //định nghĩa relationship
    public function parent()
    {
        return $this->belongsTo("App\Category", "parent_id");
    }

    // relationship one to many
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function brand()
    {
        return $this->hasMany('App\brand');
    }

    protected $status = [
        1 => [
            'name1' => 'public',
            'class' => 'btn btn-info'
        ],
        0 => [
            'name1' => 'private',
            'class' => 'btn btn-danger'
        ]
    ];
    public function get()
    {
        return array_get($this->status,$this->is_active);
    }
}