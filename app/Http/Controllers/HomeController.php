<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $categories = Category::all();
        $foods = Category::find(1)->foods;
        $drinks= Category::find(2)->foods;
        return view('fe.home', compact('categories','foods','drinks'));
    }
    public function order(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            Order::create($data);
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Đặt bàn thất bại');
        }
        return redirect()->back()->with('error','Đặt bàn thành công');
    }
}
