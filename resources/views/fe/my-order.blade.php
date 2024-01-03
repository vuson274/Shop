@extends('fe.layout')
@section('content_web')
    <div class="container">
        <div class="entry-content single-page">
            <div class="breadcrumb-option">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb__links">
                                <a href="{{route('home')}}"><i class="fa fa-home"></i>Trang chủ</a>
                                <span>Đơn hàng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 style="text-align: center; color: #fff3cd;">Đơn hàng</h2>
            <table style="color: #fff3cd; text-align: center;" class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Tình trạng đơn hàng</th>
                    <th scope="col">Hình thức thanh toán</th>
                </tr>
                </thead>
                <tbody>
                @php
                $count = 0;
                @endphp
                @foreach($myOrder as $order)
                <tr>
                    @php
                        $count+= 1;
                    @endphp
                    <th scope="row">{{$count}}</th>
                    <td>{{$order->order_code}}</td>
                    <td>{{number_format($order->total_price)}}</td>
                    @if($order->status == 1)
                        <td>Đang đóng gói</td>
                    @elseif($order->status == 2)
                        <td>Đang giao hàng</td>
                    @else
                        <td>Đã nhận hàng</td>
                    @endif
                    @if($order->method == 1)
                    <td>Tiền mặt</td>
                    @else
                    <td>Vnpay</td>
                    @endif
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection