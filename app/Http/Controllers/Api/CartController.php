<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    const CART_KEY = 'CART';
    public function addItemToCart(Request $request)
    {
        if($request->session()->exists(self::CART_KEY)){
            $cart = $request->session()->get(self::CART_KEY);
            $found = false;
            for ($i =0 ; $i< count($cart);$i++){
                if ($request->id == $cart[$i]['product']->id){
                    $cart[$i]['quantity'] = $cart[$i]['quantity'] + 1;
                    $found = true;
                    break;
                }
            }
            $product = Product::find($request->id);
            if (!$found){
                array_push($cart,[
                    'product'=> $product,
                    'quantity'=> 1,
                ]);
            }
            $request->session()->put(self::CART_KEY, $cart);
        }else{
            $cart =[];
            $product = Product::find($request->id);
            array_push($cart, [
                'product' => $product,
                'quantity' => 1
            ]);
            $request->session()->put(self::CART_KEY, $cart);
        }
        return response()->json(['msg' => 'Add item success', 'cart' => $cart],200);

    }
}
