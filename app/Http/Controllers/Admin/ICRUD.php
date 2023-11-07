<?php
/**
 * @Author ADMIN
 * @Date   Nov 07, 2023
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Request;

interface ICRUD
{
    public function list();

    public function add(Request $request);

    public function edit($id,Request $request);

    public function delete($id);
}