@extends('be.layout')
@section('content')
    <div class="col-lg-12">
        <h2>THÊM BÀI VIẾT</h2>
        <form action="{{route('admin.post.add')}}"  method="post"   role="form" enctype="multipart/form-data">
           @csrf
            <div class="form-group">
                <label for="">Tiêu đề</label> <span id="errorname"></span>
                <input type="text" class="form-control"  id="title" name="title"   value="{{old('title')}}" />
            </div>
            <div class="form-group">
                <label for="">Ảnh đại diện</label><span id="errormain"></span>
                <input type="file" class="form-control" id="thumb" name="thumb"  accept="image/png, image/gif, image/jpeg" onchange="checkImageMain();" value="" Required>
            </div>
            <div class="form-group">
                <label for="">Nội dung</label>
                <textarea  class="form-control ckeditor" id="editor" name="content"  value="" >{{old('content')}}</textarea>
            </div>
            <div class="footer">
                <button type="submit"  name="insert" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
@endsection