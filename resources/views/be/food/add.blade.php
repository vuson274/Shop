@extends('be.layout')
@section('content')
<div class="col-lg-12">
    <h2> THÊM SẢN PHẨM</h2>
    <form action="{{route('admin.food.add')}}"  method="post"   role="form" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="">Tên</label> <span id="errorname" class="text-danger">@error('name'){{$message}}@enderror</span>
                <input type="text" class="form-control"  id="name" name="name"   value="{{old('name')}}" onblur="checkname()";/>
            </div>
            <div class="form-group">
                <label for="">Loại thực phẩm</label>
                <select  id="category_id" name="category_id" class="form-control" >
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Giá</label> <span id="errorprice" class="text-danger">@error('price'){{$message}}@enderror</span>
                <input type="text" class="form-control" id="price" name="price"  value="{{old('price')}}" onblur="checkPrice();" >
            </div>

            <div class="form-group">
                <label for="">Mô tả</label><span id="errorcontent" style="color: red">@error('content'){{$message}}@enderror</span>
                <textarea  class="form-control ckeditor" id="editor"  value=""  name="description">{{old('content')}}</textarea>
            </div>
        <div class="footer">
            <button type="submit"  name="insert" class="btn btn-primary">Thêm</button>
        </div>
    </form>
</div>
@endsection