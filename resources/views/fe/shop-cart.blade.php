@extends('fe.layout')
@section('content_web')
    <div>
        <!-- Breadcrumb Begin -->
        <div class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__links">
                            <a href="{{route('home')}}"><i class="fa fa-home"></i> Trang chủ</a>
                            <span>Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Shop Cart Section Begin -->
        <section class="shop-cart spad">
            @if(session('CART'))
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop__cart__table" id="cart">
                            <table id="data-cart">
                                <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(session('CART') as $cart)
                                <tr>
                                    <td class="cart__product__item">
                                        <div style="width: 100px;"><img src="{{asset($cart['product']['main_image'])}}" alt=""></div>
                                        <div class="cart__product__item__title">
                                            <h6>{{$cart['product']['name']}}</h6>
                                        </div>
                                    </td>
                                    <td class="cart__price">{{number_format($cart['product']['price'], 0) }}</td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty">
                                            <span class="dec qtybtn" id = "{{$cart['product']['id']}}" name="{{$cart['quantity']}}">-</span>
                                            <input min="1" id = "{{$cart['product']['id']}}" type="number" class="update-cart" pattern="[0-9]" value="{{$cart['quantity']}}" readonly>
                                            <span class="inc qtybtn" id = "{{$cart['product']['id']}}" name="{{$cart['quantity']}}">+</span>
                                        </div>
                                    </td>
                                    <td class="cart__total">{{number_format($cart['product']['price']* $cart['quantity'], 0) }}</td>
                                    <td><button class="btn-danger del-cart" id="{{$cart['product']['id']}}" style="border: 0px;border-radius: 50%; width: 40px;height: 40px"><span class="icon_close"></span></button></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="cart__btn">
                            <a href="{{route('home')}}">Mua tiếp</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 " id="test">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-4 offset-lg-2" id="total-price">
                        <div class="cart__total__procced total-price">
                            <h6>Giá trị đơn hàng</h6>
                            <span  class="totalPrice">{{number_format($total)}} đ</span>
                            <a href="{{route('check-out')}}" class="primary-btn" style="margin-bottom:20px">COD</a>
                            <a href="{{route('checkout-vnpay')}}" class="primary-btn">VNPAY</a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="container" if="${session.myCartItems == null}">
                <div class="col-md-6 offset-md-3">
                    <div class="noti_listProduct">
                        <h4>Giỏ hàng trống</h4>
                        <div class="link">
                            <a href="@{/home}">Về Trang Chủ</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </section>
        <!-- Shop Cart Section End -->
    </div>
@endsection