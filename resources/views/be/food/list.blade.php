@extends('be.layout')
@section('content')
    <div class="col-lg-12">
        <h2>SẢN PHẨM</h2>
        <div class="text-right" >
            <a class="btn btn-success" href="{{route('admin.food.doAdd')}}">Thêm</a>
        </div>
        <div><hr></div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable">
                <thead class="table">
                <tr>
                    <th>Id</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Loại thực phẩm</th>
                    <th>mô tả</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{ number_format($item->price, 0) }}</td>
                        <td>@php  echo $item->description @endphp</td>
                        <td>{{$item->category->name}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('admin.food.doEdit',['id'=>$item->id])}}">Sửa</a>
                            <a class="btn btn-danger" href="{{route('admin.food.delete',['id'=>$item->id])}}" onclick="return confirm('Bạn có muốn xoá ?')">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection