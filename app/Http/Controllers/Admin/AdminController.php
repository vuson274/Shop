<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Exception;

class AdminController extends Controller implements ICRUD
{
    //
    public function list()
    {
        return view('be.user.list');
    }

    public function add(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            $data['password'] = Hash::make($data['password']);
            Admin::create($data);
        } catch (Exception $exception){
            return redirect()->back()->with('error','thêm thất bại');
        }
        return redirect()->back()->with('success','thêm thành công');
    }

    public function edit($id, Request $request)
    {
        // TODO: Implement edit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
