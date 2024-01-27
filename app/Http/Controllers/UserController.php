<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\ICRUD;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function list()
    {
        $list = User::all();
        return view('be.user.list',compact('list'));
    }

    public function add(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            $data['password'] =  Hash::make($data['password']);
            User::create($data);
        }catch (\Exception $exception){
            return redirect()->route('admin.user.list')->with('error','Thêm thất bại');
        }
        return redirect()->route('admin.user.list')->with('success','Thêm thành công');
    }

    public function edit(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            unset($data['insert']);
            $data['password'] =  Hash::make($data['password']);
            User::where('id',$data['id'])->update($data);
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Sửa thất bại');
        }
        return redirect()->back()->with('success','Sửa thành công');
    }

    public function delete($id)
    {
        try {
            User::where('id',$id)->delete();
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Xóa thất bại');
        }
        return redirect()->back()->with('success','Xóa thành công');
    }
}
