@extends('be.layout')
@section('content')
<div class="col-lg-12">
    <h2> THÊM SẢN PHẨM</h2>
    <form action="{{route('admin.product.add')}}"  method="post"   role="form" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="">Tên</label> <span id="errorname" class="text-danger">@error('name'){{$message}}@enderror</span>
                <input type="text" class="form-control"  id="name" name="name"   value="{{old('name')}}" onblur="checkname()";/>
            </div>
            <div class="form-group">
                <label for="">Loại sản phẩm</label>
                <select  id="category_id" name="category_id" class="form-control" >
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Xuất xứ</label> <span id="errororigin" style="color: red">@error('origin'){{$message}}@enderror</span>
                <input type="text" class="form-control" id="origin" name="origin"  value="{{old('origin')}}" onblur="checkOrigin();">
            </div>
            <div class="form-group">
                <label for="">Ảnh chính</label><span id="errormain"></span>
                <input type="file" class="form-control" id="mainImage" name="mainImage"  accept="image/png, image/gif, image/jpeg" onchange="checkImageMain();" value="" Required>
            </div>

            <div class="form-group">
                <label for="">Ảnh phụ</label><span id="errorsecond"></span>
                <input type="file" class="form-control" id="secondImage" name="secondImage" accept="image/png, image/gif, image/jpeg" onchange="checkImageSecond();" value="" Required>
            </div>

            <div class="form-group">
                <label for="">Giá</label> <span id="errorprice" class="text-danger">@error('price'){{$message}}@enderror</span>
                <input type="text" class="form-control" id="price" name="price"  value="{{old('price')}}" onblur="checkPrice();" >
            </div>

            <div class="form-group">
                <label for="">Số lượng</label> <span id="errorquantity" style="color: red">@error('quantity'){{$message}}@enderror</span>
                <input type="number" class="form-control" id="quantity" name="quantity"  value="{{old('quantity')}}" onblur="checkQuantity();" >
            </div>

            <div class="form-group">
                <label for="">Mô tả</label><span id="errorcontent" style="color: red">@error('content'){{$message}}@enderror</span>
                <textarea  class="form-control ckeditor" id="editor" name="content"  value="" >{{old('content')}}</textarea>
            </div>
        <div class="footer">
            <button type="submit"  name="insert" class="btn btn-primary">Thêm</button>
        </div>
    </form>
</div>
@endsection