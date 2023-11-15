<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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

    public function edit(Request $request)
    {
        // TODO: Implement edit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
