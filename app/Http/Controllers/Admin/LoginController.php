<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function viewLogin(){
        return view('be.login');
    }

    public function Login(Request $request){
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password, 'level'=>1])){
            return redirect()->route('admin.user.list');
        }
        return back();
    }

    public function Logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
