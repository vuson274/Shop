<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller implements ICRUD
{
    //
    public function list()
    {
        $list = Product::all();
        $categories = Category::all();
        return view('be.product.list',compact('list', 'categories'));
    }

    public function doAdd(){
        $categories = Category::all();
        return view('be.product.add',compact('categories'));
    }

    public function add(Request $request)
    {
        $request->validate([
           'name'=>'required',
           'origin'=>'required',
           'price'=>'required|numeric',
           'quantity'=>'required|numeric',
           'content'=>'required'
       ]);
        try {
            $data = $request->all();
            unset($data['_token']);
            $mainImage = $data['mainImage'];
            $secondImage = $data['secondImage'];
            $mainImageName = time().'1'.$mainImage->getClientOriginalName();
            $secondImageName = time().'2'.$secondImage->getClientOriginalName();
            $mainImage->storeAs('/products', $mainImageName, 'public');
            $secondImage->storeAs('/products', $secondImageName, 'public');
            $data['main_image'] = 'storage/products/' . $mainImageName;
            $data['second_image'] = 'storage/products/' . $secondImageName;
            Product::create($data);
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Thêm thất bại');
        }
        return redirect(route('admin.product.list'))->with('success', "Thêm thành công");

    }
    public function doEdit($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('be.product.edit', compact('product', 'categories'));
    }
    public function edit(Request $request)
    {

        try {
            $data = $request->all();
            $product = Product::find($data['id']);
            unset($data['_token']);
            if (empty($data['mainImage'])){
                $data['main_image'] = $product['main_image'];
            } else{
                Storage::disk('public')->delete($product['main_image']);
                $mainImage = $data['mainImage'];
                $mainImageName = time().'1'.$mainImage->getClientOriginalName();
                $mainImage->storeAs('/products', $mainImageName, 'public');
                $data['main_image'] = 'storage/products/' . $mainImageName;
            }
            if (empty($data['secondImage'])){
                $data['second_image'] = $product['second_image'];
            } else{
                Storage::disk('public')->delete($product['second_image']);
                $secondImage = $data['secondImage'];
                $secondImageName = time().'2'.$secondImage->getClientOriginalName();
                $secondImage->storeAs('/products', $secondImageName, 'public');
                $data['second_image'] = 'storage/products/' . $secondImageName;
            }
            unset($data['insert']);
            unset($data['mainImage']);
            unset($data['secondImage']);
            Product::where('id', $data['id'])->update($data);
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Sửa thất bại');
        }
        return redirect(route('admin.product.list'))->with('success', 'Sửa thành công');
    }

    public function delete($id)
    {
        try {
            Product::where('id', $id)->delete();
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Xóa thất bại');
        }
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
