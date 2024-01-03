<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function product($id){
        $product = Product::find($id);

        if (!isset($_COOKIE['views_product_'.$id])){
            $product['view'] = $product['view'] +1 ;
            $product->save();
            setcookie('views_product_'.$id, $id, time()+ 20*60);
        }
        $proRelate = Product::orderBy('id','DESC')->where('category_id', $product->category_id)->limit(8)->get();
        return view('fe.product-detail', compact('product','proRelate'));
    }

    public function search(Request $request){
        $name = $request->name;
        $products = Product::where('name','LIKE' , "%".$name."%")->get();
        return response()->json($products, 200);
    }
    public function shop(){
        $categories = Category::all();
        $products = Product::orderBy('id','desc')->paginate(9);
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

    public function profile(){
        return view('fe.my-profile');
    }
    public function editProfile(){
        $data = Auth::user();
        return view('fe.edit-profile', compact('data'));
    }

    public function doEditProfile($id, Request $request){
        try {
            $data = $request->all();
            unset($data['_token']);
            $data['password'] = Hash::make($data['password']);
            User::where('id',$id)->update($data);
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Cập nhật thất bại');
        }
    }

    public function warranty(){
        return view('fe.warranty');
    }

    public function myOrder(){
        $id = Auth::user()->id;
        $myOrder = Order::orderBy('id','DESC')->where('user_id',$id)->get();
        return view('fe.my-order', compact('myOrder'));
    }

    public function blog(){
        $blog = Post::orderBy('id','DESC')->paginate(6);
        return view('fe.blog', compact('blog'));
    }

    public function blogDetail($id){
        $post = Post::find($id);
        $listNews = Post::orderBy('id','DESC')->limit(3)->get();
        return view('fe.blog-detail', compact('post','listNews'));
    }
}
