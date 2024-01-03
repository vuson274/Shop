<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller implements ICRUD
{
    public function list()
    {
        $list= User::all();
        return view('be.user.list',compact('list'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6',
            'phone'=>'required|numeric'
        ]);
        try {
            $data = $request->all();
            unset($data['_token']);
            $data['password'] = Hash::make($data['password']);
            User::create($data);
        } catch (Exception $exception){
            return redirect()->back()->with('error','thêm thất bại');
        }
        return redirect()->back()->with('success','thêm thành công');
    }

    public function edit( Request $request)
    {
        try {
            $data = $request->all();
            $user = User::find($data['id']);
            $data['password'] = Hash::make($data['password']);
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->phone = $data['phone'];
            $user->save();
        }catch (\Exception $e){
            return redirect()->back()->with('error','Sửa thất bại');
        }
        return redirect()->back()->with('success','Sửa thành công');

    }

    public function delete($id)
    {
        try {
            User::where('id', $id)->delete();
        }catch (Exception $exception){
            return redirect()->back()->with('error','Xóa thất bại');
        }
        return redirect()->back()->with('success','Xoá thành công');
    }
}
