@extends('fe.layout')
@section('content_web')
    <div class="home">
{{--        <div class="alert alert-success alert-dismissible" th:if="${message}">--}}
{{--            <button type="button" class="close" data-dismiss="alert">&times;</button>--}}
{{--            <strong th:text="${message}"></strong>--}}
{{--        </div>--}}
{{--        <div class="alert alert-danger alert-dismissible" th:if="${messageError}">--}}
{{--            <button type="button" class="close" data-dismiss="alert">&times;</button>--}}
{{--            <strong th:text="${messageError}"></strong>--}}
{{--        </div>--}}
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
                            <li  data-filter="'.'+ 'pro'+{{$category->id}}+'cat'" >{{$category->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row property__gallery" id="page">
                    @foreach($products as $product)
                    <div  id="product"    class="'col-lg-3 col-md-4 col-sm-6 mix '+ 'pro'+{{$product->category->name}}+'cat'">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-id="{{$product->id}}" data-setbg="{{asset($product->main_image)}}">
                                <ul class="product__hover">
                                    <li><a href="#detail" data-toggle="modal" data-target="#detail" class="detail" id="{{$product->id}}"><span class="fa fa-eye"></span></a></li>
                                    <li><a  class="heart" id="{{$product->id}}"><span class="icon_heart_alt"></span></a></li>
                                    <li><a href="#order" class="order" id="{{$product->id}}"><span class="icon_bag_alt" type="buy"></span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>
                                    <a href="@{/product/{id}(id = ${product.id})}">{{$product->name}}</a>
                                </h6>
{{--                                <div class="product__price" th:text="${#numbers.formatDecimal(product.price, 0, 'COMMA', 0, 'POINT')} + đ"></div>--}}
                                <div class="product__price">{{number_format($product->price, 0) }} đ</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
{{--            <!-- Phân trang  -->--}}
            <div class="col-lg-12 text-center">
                <div class="pagination__option">
                    <a  th:each="i: ${#numbers.sequence( 0, page,1)}" th:text="${i+1}" class="page" th:id="${i}" th:href="@{'/home?p='+${i}}"></a>
                </div>
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
                                    <a th:href="@{/shop}">Shop now</a>
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
                            <div class="trend__item" th:each="productNew : ${listProductsNew}">
                                <div class="trend__item__pic">
                                    <img width="90" height="90" th:src="@{'/getimage/'+ ${productNew.mainImage}}" alt="">
                                </div>
                                <div class="trend__item__text">
                                    <h6>
                                        <a th:href="@{/product/{id}(id = ${productNew.id})}" th:text="${productNew.name}"></a>
                                    </h6>
                                    <div class="product__price" th:text="${#numbers.formatDecimal(productNew.price, 0, 'COMMA', 0, 'POINT')} + đ"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- HOT -->
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="trend__content">
                            <div class="section-title">
                                <h4>Hot</h4>
                            </div>
                            <div class="trend__item" th:each="productHot : ${listProductsHot}">
                                <div class="trend__item__pic">
                                    <img width="90" height="90" th:src="@{'/getimage/'+ ${productHot.mainImage}}" alt="">
                                </div>
                                <div class="trend__item__text">
                                    <h6>
                                        <a th:href="@{/product/{id}(id = ${productHot.id})}" th:text="${productHot.name}"></a>
                                    </h6>
                                    <div class="product__price" th:text="${#numbers.formatDecimal(productHot.price, 0, 'COMMA', 0, 'POINT')} + đ"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- HIGHT CLASS -->
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="trend__content">
                            <div class="section-title">
                                <h4>Cao cấp</h4>
                            </div>
                            <div class="trend__item" th:each="productHightClass: ${listProductsHightclass}">
                                <div class="trend__item__pic">
                                    <img width="90" height="90" th:src="@{'/getimage/'+ ${productHightClass.mainImage}}" alt="">
                                </div>
                                <div class="trend__item__text">
                                    <h6>
                                        <a th:href="@{/product/{id}(id = ${productHightClass.id})}" th:text="${productHightClass.name}"></a>
                                    </h6>
                                    <div class="product__price" th:text="${#numbers.formatDecimal(productHightClass.price, 0, 'COMMA', 0, 'POINT')} + đ"></div>
                                </div>
                            </div>
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