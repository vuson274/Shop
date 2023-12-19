<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        try {
            $data = $request->all();
            if (User::where('email', $data['email'])->first()) {
                return redirect()->back()->with('error','Email đã tồn tại trong hệ thống');
            }
            $data['password'] = Hash::make($data['password']);
            $data['level'] = 2;
            User::create($data);
        } catch (Exception $exception){
            return redirect()->back()->with('error','Đăng ký thất bại');
        }
        return redirect()->back()->with('success','Đăng ký thành công');
    }

    public function loginUser(Request $request){
            if (Auth::attempt(['email'=>$request->email,'password'=>$request->password, 'level'=>2])){
                return redirect()->route('home');
            }
            return back();
    }

    public function logoutUser(){
        Auth::logout();
        return redirect()->route('home');
    }
}
