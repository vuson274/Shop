<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $list = Category::all();
        return view('be.category.list',compact('list'));
    }

    public function add(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            Category::create($data);
        }catch (\Exception $exception){
            return redirect()->route('admin.category.list')->with('error','Thêm thất bại');
        }
        return redirect()->route('admin.category.list')->with('success','Thêm thành công');
    }

    public function edit(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            unset($data['insert']);
            Category::where('id',$data['id'])->update($data);
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Sửa thất bại');
        }
        return redirect()->back()->with('success','Sửa thành công');
    }

    public function delete($id)
    {
        try {
            Category::where('id',$id)->delete();
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Xóa thất bại');
        }
        return redirect()->back()->with('success','Xóa thành công');
    }

}
