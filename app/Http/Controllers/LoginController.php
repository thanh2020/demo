<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function getLogin()
    {
    	return view('login');
    }

    public function postLogin(Request $request)
    {
    	$data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if($request->remember = 'remember my'){
            $remember = true;
        }else{
            $remember = false;
        }
        if (Auth::attempt($data,$remember)) {
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('error','Email or password is incorrect');
        }
    }

    public  function getlogout(){
        Auth::logout();
        return redirect('login');
    }
}
