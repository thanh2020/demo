<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
session_start();
use App\Category;
use App\Product;

class AdminController extends Controller
{
  	public function index()
    {
    	return view('admin.dashboard');
    }

    public function getloginAdmin()
    {
    	return view('admin.login');
    }
    public function postloginAdmin(Request $request)
    {
    	$email = $request->email;
    	$password = $request->password;

    	if(Auth::attempt(['email' => $email, 'password' => $password])){
    		return redirect('admin');
    	}else{
    		echo "sai";
    	}
    }

    public function cart(Request $request){
    	$rowId = $request->namerowid;
    	$qty = $request->qty;
    	Cart::update($rowId,$qty);
    }

    public function search(Request $request)
    {
        $data = $request->table_search;
        // $data = str_replace(' ', '$', $data);
        $search = Product::where('name','like','%'.$data.'%')->get();
        return view('admin.search',[
            'data' => $data,
            'search' => $search,
        ]);
    }
}
