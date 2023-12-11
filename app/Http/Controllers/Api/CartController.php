<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    const CART_KEY = 'CART';
    public function addToCard(Request $request){
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

    public function cart(Request $request){
        $total = 0;
        if ($request->session()->exists(self::CART_KEY)){
            $carts = $request->session()->get(self::CART_KEY);
            foreach ($carts as $cart){
                $total += $cart['product']['price']* $cart['quantity'];
            }
        }
        return view('fe.shop-cart', compact('total'));
    }

    public function deleteItemCart(Request $request){
        $id = $request->id;
        $cart = $request->session()->get(self::CART_KEY);
        $cartClc = collect($cart);
        $cart = $cartClc->filter(function ($item) use ($id){
            return $item['product']->id != $id;
        });
        $cart = collect($cart->values());//đánh lại chỉ số
        $request->session()->put(self::CART_KEY, $cart->toArray());
        return response()->json(['msg' => 'Delete item success', 'cart' => $cart], 200);

    }

    public function update(Request $request){
        $id = $request->id;
        $quanttity =  $request->qty > 0 ? $request->qty : 1 ;
        $cart = $request->session()->get(self::CART_KEY);
        $cartClc = collect($cart);
        $cart = $cartClc->map(function ($item) use ($id, $quanttity){
            if ($item['product']->id == $id){
                $item['quantity'] = $quanttity;
                return $item;
            }
            return $item;
        });
        $request->session()->put(self::CART_KEY, $cart->toArray());
        return response()->json(['msg' => 'Update item success', 'cart' => $cart], 200);
    }
}
