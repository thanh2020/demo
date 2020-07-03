<?php

namespace App\Http\Controllers;
use App\Layout;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index(){
    	$layout = Layout::all();
    	return view('admin.layout.index',[
    		'layout' => $layout,
    		
    	]);
    }
    public function create(){
    	return view('admin.layout.create');
    }
    public function store(Request $request){
    	$validateData = $request->validate([
    		'name' => 'required',
    	]);

    	$layout = new Layout();
    	$layout->name = $request->name;
    	$layout->is_active = $request->is_active;
    	$img = $request->image->getClientOriginalName();
    	$layout->image = $request->image->move('layout',$img);
    	$layout->save();
    }
}
