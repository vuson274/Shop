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

    public function add(Request $request)
    {
        // TODO: Implement add() method.
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
