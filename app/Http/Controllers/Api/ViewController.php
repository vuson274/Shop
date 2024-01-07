<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function quickView(Request $request){
        $id = $request->id;
        $product = Product::find($id);
        return response()->json($product, 200);
    }
}
