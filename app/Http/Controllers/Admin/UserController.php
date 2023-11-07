<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class UserController extends Controller implements ICRUD
{
    //
    public function list()
    {
        return view('be.layout');
    }

    public function add(Request $request)
    {
        // TODO: Implement add() method.
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
