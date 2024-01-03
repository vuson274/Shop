@extends('fe.layout')
@section('content_web')
<div>
    @if(\Illuminate\Support\Facades\Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="z-index: 3; position: absolute; top: 20%;">
        <strong>Success!</strong>{{\Illuminate\Support\Facades\Session::get('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i>Trang chủ</a>
                        <a href="{{route('shop-cart')}}"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <form action="{{route('order-vnpay')}}"  class="checkout__form" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Chi tiết thanh toán</h5>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Tên <span>*</span></p>
                                    <input required="" type="text" id="name" name="name"  value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Địa chỉ <span>*</span></p>
                                    <input required="" type="text" id="address"  name="address"  value="{{old('address')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Số điện thoại <span>*</span></p>
                                    <input equired="" type="tell" id="phone" name="phone" value="{{old('phone')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input required="" type="email" id="email" name="email" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Ghi chú<span>*</span></p>
                                    <input type="text" id="note" name="note" value="{{old('note')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order">
                            <h5 style="color: #0b0b0b">Giỏ hàng của bạn</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">sản phẩm</span>
                                    </li>
                                    @if(session('CART'))
                                    @foreach(session('CART') as $cart)
                                    <li>
                                        {{$cart['product']->name}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Total <span>{{number_format($total) }}</span>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            @if(!empty(session('CART')))
                            <button type="submit"  class="site-btn" name="redirect">Đặt hàng</button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section End -->
</div>
@endsection