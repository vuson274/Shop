@extends('be.layout')
@section('content')
    <div class="col-lg-12">
        <h2>DẶT BÀN</h2>
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
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Số người</th>
                    <th>Ngày đặt</th>
                    <th>Giờ đặt</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->person}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->time}}</td>
                        <td>
                            <a class="btn btn-danger" href="{{route('admin.food.delete',['id'=>$item->id])}}" onclick="return confirm('Bạn có muốn xoá ?')">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection