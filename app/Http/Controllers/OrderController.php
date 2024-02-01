<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list(){
        $list = Order::all();
        return view('be.order.list', compact('list'));
    }
}
