@extends('fe.layout')
@section('content_web')
    <style>
        .product__details__text{
            color: #fff;
        }
        .product__details__text p{
            color: #fff;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .proDes p{
            color: #0b0b0b;
        }
        .proDes li{
            text-align: left;
        }
    </style>
    <div class="product_detail">
        <!-- Breadcrumb Begin -->
        <div class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__links">
                            <a href="@{/home}"><i class="fa fa-home"></i>Trang chủ</a>
                            <a href="@{/shop}">{{$product->category->name}}</a>
                            <span>{{$product->name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Product Details Section Begin -->
        <section class="product-details spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product__details__pic">
                            <div class="product__details__pic__left product__thumb nice-scroll">
                                <a class="pt active" href="#product-1">
                                    <img src="{{asset($product->main_image)}}" alt="">
                                </a>
                                <a class="pt" href="#product-2">
                                    <img src="{{asset($product->second_image)}}" alt="">
                                </a>
                            </div>
                            <div class="product__details__slider__content">
                                <div class="product__details__pic__slider owl-carousel">
                                    <img data-hash="product-1" class="product__big__img" src="{{asset($product->main_image)}}" alt="">
                                    <img data-hash="product-2" class="product__big__img" src="{{asset($product->second_image)}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product__details__text">
                            <h3>{{$product->name}}</h3>
                            <div><?php
                                    echo $product->content;
                                ?></div>
                            <div>
                                <p>Xuất xứ: {{$product->origin}}</p>
                            </div>
                            <div class="product__details__price">{{number_format($product->price, 0) }} đ</div>
                            <div class="product__details__button">
                                <a href="#order" class="cart-btn" id="{{$product->id}}"><span class="icon_bag_alt"></span> Thêm giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="related__title">
                            <h5>SẢN PHẨM TƯƠNG TỰ</h5>
                        </div>
                    </div>
                    @foreach($proRelate as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset($product->main_image)}}">
                                <ul class="product__hover">
                                    <li><a href="#detail" data-toggle="modal" data-target="#detail" class="detail" id="{{$product->id}}"><span class="fa fa-eye"></span></a></li>
                                    <li><a class="heart" id="{{$product->id}}"><span class="icon_heart_alt"></span></a></li>
                                    <li><a href="#order" class="order" id="{{$product->id}}"><span class="icon_bag_alt"></span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{route('product',['id'=>$product->id])}}">{{$product->name}}</a></h6>
                                <div class="product__price">{{number_format($product->price, 0) }} đ</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Product Details Section End -->
        <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xem nhanh thông tin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6" id="imgDetail">
                                    <img src="" alt="">
                                </div>
                                <div class="col-md-6" style="text-align: center;">
                                    <h3></h3><br>
                                    <div class="proDes"></div>
                                    <h4></h4><br>
                                    <div class="product__details__button">
                                        <a href="#order" class="cart-btn" id="" style="float: none;"><span class="icon_bag_alt"></span>Thêm giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection