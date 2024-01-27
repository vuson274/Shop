<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function list()
    {
        $list = Food::all();
        $categories = Category::all();
        return view('be.food.list',compact('list', 'categories'));
    }

    public function doAdd(){
        $categories = Category::all();
        return view('be.food.add',compact('categories'));
    }

    public function add(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            Food::create($data);
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Thêm thất bại');
        }
        return redirect(route('admin.food.list'))->with('success', "Thêm thành công");

    }
    public function doEdit($id){
        $food = Food::find($id);
        $categories = Category::all();
        return view('be.food.edit', compact('food', 'categories'));
    }
    public function edit(Request $request)
    {

        try {
            $data = $request->all();
            $food = Food::find($data['id']);
            unset($data['_token']);
            unset($data['insert']);
            Food::where('id', $data['id'])->update($data);
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Sửa thất bại');
        }
        return redirect(route('admin.food.list'))->with('success', 'Sửa thành công');
    }

    public function delete($id)
    {
        try {
            Food::where('id', $id)->delete();
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Xóa thất bại');
        }
        return redirect()->back()->with('success', 'Xóa thành công');

    }
}
