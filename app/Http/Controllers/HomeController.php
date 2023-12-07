<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $categories = Category::all();
        $products = Product::orderBy('id','DESC')->paginate(12);
        $listNewProduct = Product::orderBy('id','DESC')->limit(5)->get();
        $listHotProduct = Product::orderBy('sold','DESC')->limit(5)->get();
        $listViewProduct = Product::orderBy('view','DESC')->limit(5)->get();
        return view('fe.home', compact('categories','products','listNewProduct','listHotProduct','listViewProduct'));
    }
    public function detailProduct($id){
        $product = Product::find($id);
        return view('fe.detailProduct',compact('product'));
    }

    public function product($id){
        $product = Product::find($id);
        $proRelate = Product::orderBy('id','DESC')->where('category_id', $product->category_id)->limit(8)->get();
        return view('fe.product-detail', compact('product','proRelate'));
    }

    // public function search(Request $request){
    //     $products = Product::where('name','LIKE' , "%".$request->name."%")->get();
    //     return response()->json($products, 200);
    // }
    public function search(Request $request){
        $name = $request->name;
        $products = Product::where('name','LIKE' , "%".$name."%")->get();
        return response()->json($products, 200);
    }
    public function shop(){
        $categories = Category::all();
        $products = Product::orderBy('id','desc')->paginate(3);
        return view('fe.shop',compact('categories','products'));
    }
    public function contact(){
        return view('fe.contact');
    }
    public function signin(){
        return view('fe.signin');
    }
    public function signup(){
        return view('fe.signup');
    }
}
