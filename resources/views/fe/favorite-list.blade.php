@extends('fe.layout')
@section('content_web')
    <style>
        p {
            color: #0b0b0b;
        }
    </style>
    <div>
        <div class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__links">
                            <a href="{{route('home')}}"><i class="fa fa-home"></i>Trang chủ</a>
                            <span>Sản phẩm yêu thích</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2 style="text-align: center;padding: 30px 0px; color: #fff">Sản Phẩm Yêu Thích</h2>
        <div class="container">
            <div class="row">
                @if(session('HEART'))
                @foreach(session('HEART') as $heart)
                <div class="col-md-4">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-id="{{$heart['product']['id']}}"
                             data-setbg="{{asset($heart['product']['main_image'])}}">
                            <ul class="product__hover">
                                <li><a href="#detail" data-toggle="modal" data-target="#detail" class="detail" id="${like.getValue().id}"><span class="fa fa-eye"></span></a></li>
                                <li><a href="#delete" class="delete" id="{{$heart['product']['id']}}"><span class="fa fa-trash" aria-hidden="true"></span></a></li>
                                <li><a href="#order" class="order" id="{{$heart['product']['id']}}"><span class="icon_bag_alt" type='buy'></span></></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>
                                <a href="{{route('product',['id'=>$heart['product']['id']])}}">{{$heart['product']['name']}}</a>
                            </h6>
                            <div class="product__price">{{number_format($heart['product']['price'], 0) }} đ</div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    <div class="col-md-6 offset-md-3">
                        <div class="noti_listProduct">
                            <h4>Bạn chưa yêu thích sản phẩm nào</h4>
                            <div class="link">
                                <a href="{{route('home')}}">Về Trang Chủ</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
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