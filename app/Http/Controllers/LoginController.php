<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function viewLogin(){
        return view('be.login');
    }

    public function doLogin(Request $request){
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('admin.user.list');
        }
        return back();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('view.login');
    }
}
