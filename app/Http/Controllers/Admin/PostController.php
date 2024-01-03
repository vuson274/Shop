<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller implements ICRUD
{

    public function list()
    {
        $list = Post::all();
        return view('be.post.list', compact('list'));
    }

    public function create(){
        return view('be.post.add');
    }
    public function add(Request $request)
    {
        try {
            $data = $request->all();
            unset($data['_token']);
            $image = $data['thumb'];
            $imageName = time().'1'.$image->getClientOriginalName();
            $image->storeAs('/posts', $imageName, 'public');
            $data['image'] = 'storage/posts/' . $imageName;
            Post::create($data);
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Thêm thất bại');
        }
        return redirect(route('admin.post.list'))->with('success', "Thêm thành công");
    }

    public function doEdit($id){
        $post = Post::find($id);
        return view('be.post.edit',compact('post'));
    }
    public function edit(Request $request)
    {
        try {
            $data = $request->all();
            $post = Post::find($data['id']);
            unset($data['_token']);
            if (empty($data['thumb'])){
                $data['image'] = $post['image'];
            } else{
                Storage::disk('public')->delete($post['image']);
                $image = $data['thumb'];
                $imageName = time().$image->getClientOriginalName();
                $image->storeAs('/posts', $imageName, 'public');
                $data['image'] = 'storage/posts/' . $imageName;
            }
            unset($data['insert']);
            unset($data['thumb']);
            Post::where('id', $data['id'])->update($data);
        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Sửa thất bại');
        }
        return redirect(route('admin.post.list'))->with('success', 'Sửa thành công');
    }

    public function delete($id)
    {
        try {
            Post::where('id', $id)->delete();
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Xóa thất bại');
        }
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
