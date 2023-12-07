@extends('fe.layout')
@section('content_web')
    <style>
        .proDes p{
            color: #0b0b0b;
        }
        .proDes li{
            text-align: left;
        }
    </style>
        <!-- Breadcrumb Begin -->
        <div class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__links">
                            <a th:href="@{/home}"><i class="fa fa-home"></i>Trang chủ</a>
                            <span>Cửa hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--     Breadcrumb End -->

        <!-- Shop Section Begin -->
        <section class="shop spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="shop__sidebar">
                            <div class="sidebar__categories">
                                <div class="section-title">
                                    <h4>Danh mục</h4>
                                </div>
                                <div class="categories__accordion">
                                    <div class="accordion" id="accordionExample">
                                        @foreach($categories as $category)
                                        <div class="card" >
                                            <div class="card-heading ">
                                                <a data-filter=".pro{{$category->id}}cat">{{$category->name}}</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="row property__gallery">
                            @foreach($products as $product)
                            <div class="'col-lg-3 col-md-4 col-sm-6 mix pro{{$product->category->id}}cat">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{asset($product->main_image)}}">
                                        <ul class="product__hover">
                                            <li><a href="#detail" data-toggle="modal" data-target="#detail" class="detail" id="{{$product->id}}"><span class="fa fa-eye"></span></a></li>
                                            <li><a class="heart" id="{{$product->id}}" ><span class="icon_heart_alt"></span></a></li>
                                            <li><a href="#order" class="order"id="{{$product->id}}"><span
                                                            class="icon_bag_alt"></span></a></li>
                                        </ul>
                                    </div>

                                    <div class="product__item__text">
                                        <h6><a href="{{route('product',['id'=>$product->id])}}">{{$product->name}}</a>
                                        </h6>
                                        <div class="product__price">{{number_format($product->price, 0) }} đ</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Phân trang  -->
{{--                            <div class="col-lg-12 text-center">--}}
{{--                                <div class="pagination__option">--}}
{{--                                    <a  th:each="i: ${#numbers.sequence( 0, page,1)}" th:text="${i+1}" class="page" th:id="${i}" th:href="@{'/shop?p='+${i}}"></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div>
                        <div style="display:flex; justify-content: center;">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop Section End  -->

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
@endsection