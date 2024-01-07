@extends('fe.layout')
@section('content_web')
    <div class="home">
        @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-success alert-dismissible" style="position: absolute; top: 30%; width: 20%; z-index: 40">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{\Illuminate\Support\Facades\Session::get('success')}}</strong>
        </div>
        @endif
        <section class="banner1">
            <img src="{{asset('/web/images/bg1.jpg')}}" id="bg">
            <img src="{{asset('/web/images/moon.png')}}" id="moon">
            <img src="{{asset('/web/images/mountain.png')}}" id="mountain">
            <img src="{{asset('/web/images/road.png')}}" id="road">
            <h2 id="text">Moon Light</h2>
        </section>
        <!-- Product Section Begin -->
        <section class="product spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="section-title">
                            <h4>Sản phẩm mới</h4>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <ul class="filter__controls">
                            <li class="active" data-filter="*">All</li>
                            @foreach($categories as $category)
                            <li  data-filter=".pro{{$category->id}}cat" >{{$category->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row property__gallery" id="page">
                    @foreach($products as $product)
                    <div  id="product"    class="'col-lg-3 col-md-4 col-sm-6 mix pro{{$product->category->id}}cat">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-id="{{$product->id}}" data-setbg="{{asset($product->main_image)}}">
                                <ul class="product__hover">
                                    <li><a href="#detail" data-toggle="modal" data-target="#detail" class="detail" id="{{$product->id}}"><span class="fa fa-eye"></span></a></li>
                                    <li><a  href="#heart" class="heart" id="{{$product->id}}"><span class="icon_heart_alt"></span></a></li>
                                    <li><a href="#order" class="order" id="{{$product->id}}"><span class="icon_bag_alt" type="buy"></span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>
                                    <a href="{{route('product',['id'=>$product->id])}}">{{$product->name}}</a>
                                </h6>
                                <div class="product__price">{{number_format($product->price, 0) }} đ</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
{{--            <!-- Phân trang  -->--}}
{{--            <div class="col-lg-12 text-center">--}}
{{--                <div class="pagination__option">--}}
{{--                    <a  th:each="i: ${#numbers.sequence( 0, page,1)}" th:text="${i+1}" class="page" th:id="${i}" th:href="@{'/home?p='+${i}}"></a>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div style="display:flex; justify-content: center;">
                {{$products->links()}}
            </div>

        </section>
        <!-- Product Section End -->
        <!-- Banner Section Begin -->
        <section class="banner set-bg" data-setbg="{{asset('/web/images/banner.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-8 m-auto">
                        <div class="banner__slider owl-carousel">
                            <div class="banner__item">
                                <div class="banner__text">
                                    <span>The Moon Light Collection</span>
                                    <h1>The Project Telescope</h1>
                                    <a href="{{route('shop')}}">Shop now</a>
                                </div>
                            </div>
                            <div class="banner__item">
                                <div class="banner__text">
                                    <span>The Moon Light Collection</span>
                                    <h1>The Project Camera</h1>
                                    <a th:href="@{/shop}">Shop now</a>
                                </div>
                            </div>
                            <div class="banner__item">
                                <div class="banner__text">
                                    <span>The Moon Light Collection</span>
                                    <h1>The Project Accessory</h1>
                                    <a th:href="@{/shop}">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
{{--        <!-- Banner Section End -->--}}
{{--        <!-- Trend Section Begin -->--}}
        <section class="trend spad">
            <div class="container">
                <div class="row">
                    <!-- NEW -->
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="trend__content">
                            <div class="section-title">
                                <h4>Mới</h4>
                            </div>
                            @foreach($listNewProduct as $newProduct)
                            <div class="trend__item" >
                                <div class="trend__item__pic">
                                    <img width="90" height="90" src="{{asset($newProduct->main_image)}}" alt="">
                                </div>
                                <div class="trend__item__text">
                                    <h6>
                                        <a href="{{route('product',['id'=>$newProduct->id])}}">{{$newProduct->name}}</a>
                                    </h6>
                                    <div class="product__price">{{number_format($newProduct->price, 0) }} đ</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- HOT -->
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="trend__content">
                            <div class="section-title">
                                <h4>Hot</h4>
                            </div>
                            @foreach($listHotProduct as $hotProduct)
                            <div class="trend__item">
                                <div class="trend__item__pic">
                                    <img width="90" height="90" src="{{asset($hotProduct->main_image)}}" alt="">
                                </div>
                                <div class="trend__item__text">
                                    <h6>
                                        <a href="{{route('product',['id'=>$hotProduct->id])}}">{{$hotProduct->name}}</a>
                                    </h6>
                                    <div class="product__price">{{number_format($hotProduct->price, 0) }} đ</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- HIGHT CLASS -->
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="trend__content">
                            <div class="section-title">
                                <h4>Xem nhiều nhất</h4>
                            </div>
                            @foreach($listViewProduct as $viewProduct)
                            <div class="trend__item">
                                <div class="trend__item__pic">
                                    <img width="90" height="90" src="{{asset($viewProduct->main_image)}}" alt="">
                                </div>
                                <div class="trend__item__text">
                                    <h6>
                                        <a href="{{route('product',['id'=>$viewProduct->id])}}" >{{$viewProduct->name}}</a>
                                    </h6>
                                    <div class="product__price" >{{number_format($viewProduct->price, 0) }} đ</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Trend Section End -->
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
                                <div class="col-md-6" style="text-align: left;">
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