<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class HeartController extends Controller
{
    const HEART_KEY = 'HEART';
    public function addHeart(Request $request){
        if($request->session()->exists(self::HEART_KEY)){
            $heart = $request->session()->get(self::HEART_KEY);
            $found = false;
            for ($i =0 ; $i< count($heart);$i++){
                if ($request->id == $heart[$i]['product']->id){
                    $found = true;
                    break;
                }
            }
            $product = Product::find($request->id);
            if (!$found){
                array_push($heart,[
                    'product'=> $product
                ]);
            }
            $request->session()->put(self::HEART_KEY, $heart);
        }else{
            $heart =[];
            $product = Product::find($request->id);
            array_push($heart, [
                'product' => $product,
            ]);
            $request->session()->put(self::HEART_KEY, $heart);
        }
        return response()->json(['msg' => 'Add item success', 'cart' => $heart],200);
    }

    public function favorite(){
        return view('fe.favorite-list');
    }

    public function deHeart(Request $request){
        $id = $request->id;
        $heart = $request->session()->get(self::HEART_KEY);
        $heartClc = collect($heart);
        $heart = $heartClc->filter(function ($item) use ($id){
            return $item['product']->id != $id;
        });
        $heart = collect($heart->values());//đánh lại chỉ số
        $request->session()->put(self::HEART_KEY, $heart->toArray());
        return response()->json(['msg' => 'Delete item success', 'cart' => $heart], 200);
    }
}
