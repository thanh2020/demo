<?php

namespace App\Http\Controllers;
use App\Tin;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function index()
    {
        $news = Tin::all();
    	return view('admin.new.index',[
            'news' => $news
        ]);
    }

    public function create()
    {
    	return view('admin.new.create');
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
         ]);

	    $new = new Tin();
	    $new->name = $request->name;
	    $new->slug = str_slug($request->name);
	    if ($request->hasFile('image')) {
	    	$img = $request->image->getClientOriginalName();
	    	$new->image = $request->image->move('new',$img); 
	    }
        if ($request->has('is_active')){
            $new->is_active = $request->is_active;
        }
	    $new->is_active = $request->is_active;
	    $new->summary = $request->summary;
	    $new->description = $request->description;
	    $new->position = $request->position;
	    $new->save();

        return redirect()->route('admin.new.index');
	}

    public function show()
    {
        dd('show');
    }

    public function delete($id)
    {
        $item = Tin::find($id);
        $item->delete();
        return back();
    }
}
