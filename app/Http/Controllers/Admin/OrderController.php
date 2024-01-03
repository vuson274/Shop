<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller implements ICRUD
{
    //
    public function list()
    {
        $list = Order::orderBy('id','DESC')->get();
        return view("be.order.list", compact('list'));
    }

    public function add(Request $request)
    {
        // TODO: Implement add() method.
    }

    public function edit(Request $request)
    {
        try {
            $id = $request->id;
            $data = $request->status;
            $order = Order::find($id);
            $order->status = $data;
            $order->save();
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Sửa thất bại');
        }
        return redirect()->back()->with('success','Sửa thành công');
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
