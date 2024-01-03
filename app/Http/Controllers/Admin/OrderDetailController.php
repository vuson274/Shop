<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderDetailController extends Controller
{
    public function detail($id){
        $orderDetail = OrderDetail::orderBy('id','DESC')->where('order-id',$id)->get();
        $order = Order::find($id);
        return view('be.order.order-detail',compact('orderDetail','order'));
    }
}
