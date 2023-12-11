<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    const CART_KEY = 'CART';
    public function ckeckOut(Request $request){
        $total = 0;
        if ($request->session()->exists(self::CART_KEY)){
            $carts = $request->session()->get(self::CART_KEY);
            foreach ($carts as $cart){
                $total += $cart['product']['price']* $cart['quantity'];
            }
        }
        return view('fe.check-out', compact('total'));
    }

    public function makeOrder(Request $request){
        dd(123);
    }

}
