@extends('be.layout')
@section('content')
    <div class="col-md-12">
        <h2>CHI TIẾT ĐƠN HÀNG</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table">
                <tr>
                    <th>Điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Tổng tiền</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td rowspan="{{count($orderDetail)}}">{{$order->phone}}</td>
                    <td rowspan="{{count($orderDetail)}}">{{$order->address}}</td>
                    @php
                    $count=0;
                    @endphp
                    @foreach($orderDetail as $value)
                    @php
                    $count+=$value['quantity'];
                    @endphp
                    <td>{{$value->product->name}}</td>
                    <td><img style=" width: 100px;" src="{{asset($value->product->main_image)}}"></td>
                    <td>{{$value->quantity}}</td>
                    <td>{{number_format($value->price, 0) }}</td>
                    <td>{{number_format($value->total, 0) }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <h4 style="color: #3db9dc;">SỐ LƯỢNG SẢN PHẨM: {{$count}}</h4>
            <h4 style="color: #3db9dc;">TỔNG GIÁ TRỊ ĐƠN HÀNG: {{number_format($order->total_price, 0) }}</h4>
        </div>
    </div>
@endsection