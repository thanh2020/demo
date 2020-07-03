<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class AnhController extends Controller
{
    public function getanh(){
        return view('anh');
    }

    public function upAnh(Request $request){
        $validation = $request->validate([
            'name' => 'required',
            'anh' => 'image',
        ]);
        
    	$filename = $request->anh->getClientOriginalName();
        $img = new Image();
        $img->name = $request->name;
        $img->anh = $filename;
        $request->anh->move('image',$filename);
        $img->save();
        
        echo "thanh cong";
    }
}
