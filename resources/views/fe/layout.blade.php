<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Moon Light</title>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link rel="icon" type="" href="{{asset('/web/images/logo2.png')}}">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('/web/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/web/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/web/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/web/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/web/css/magnific-popup.cs')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/web/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/web/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/web/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/web/css/styleBanner.css')}}" type="text/css">
</head>
<body>
<!--<div id="preloder">-->
<!--    <div class="loader"></div>-->
<!--</div>-->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <ul class="offcanvas__widget">
        <li><span class="icon_search search-switch"></span></li>
        <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip" if="${session.myLikeItems}" text="${session.myLikeNum}"></div>
            </a></li>
        <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">
                    @if(session('CART'))
                        {{count(session('CART'))}}
                    @else
                        0
                    @endif
                </div>
            </a></li>
    </ul>
    <div class="offcanvas__logo">
        <a href="#"><img src="{{asset('/web/images/logo2.png')}}" alt=""></a>
    </div>
    <div id="mobile-menu-wrap">
        <div class="slicknav_menu"><a href="#" aria-haspopup="true" role="button" tabindex="0"
                                      class="slicknav_btn slicknav_collapsed" style="outline: none;"><span
                        class="slicknav_menutxt">MENU</span><span class="slicknav_icon"><span
                            class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span><span
                            class="slicknav_icon-bar"></span></span></a>
        </div>
    </div>
    <div class="offcanvas__auth">
        <a href="{{route('signin')}}">Login</a>
    </div>
</div>
<!-- Header Section Begin -->
<header class="header" style="width: 100%;">
    <div class="container-fluid" style="position: absolute; z-index: 11; padding: 0; left: -2%">
        <div class="row" w>
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="{{route('home')}}"><img style="width: 200px" src="{{asset('/web/images/logo1.png')}}"
                                               alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7" style="padding: 0; margin: 0">
                <nav class="header__menu">
                    <ul>
                        <li><a href="{{route('home')}}">Trang chủ</a></li>
                        <li><a href={{route('shop')}}>Cửa hàng</a></li>
                        <li><a href={{route('blog')}}>Bài viết</a></li>
                        <li><a href={{route('contact')}}>Liên hệ</a></li>
                        <li><a href="{{route('warranty')}}">Bảo hành</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3" style="padding: 0; margin: 0">
                <div class="header__right">
                    @if(!\Illuminate\Support\Facades\Auth::check() or \Illuminate\Support\Facades\Auth::user()->level !=2)
                        <div class="header__right__auth">
                            <a href="{{route('signin')}}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
                                </svg></a>
                        </div>
                    @endif
                    <ul class="header__right__widget">
                        @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->level==2)
                            <li>
                                <a href="#" style="color: #fff;">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                                <ul>
                                    <li><a href="{{route('profile')}}">Hồ sơ</a></li>
                                    <li><a href="{{route('my-order')}}">Đơn hàng</a></li>
                                    <li><a href="{{route('logout-user')}}" onclick ="return confirm ('bạn có thật sự muốn đăng xuất?');">Đăng xuất</a></li>
                                </ul>
                            </li>
                        @endif
                        <li>
                            <span class="icon_search search-switch"></span>
                        </li>
                        <li>
                            <a href="{{route('favorite-list')}}"><span class="icon_heart_alt" style="color: #fff"></span>
                                <div id="heart">
                                    @if(session('HEART'))
                                    <div class="tip" id="like"> {{count(session('HEART'))}}</div>
                                    @endif
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('shop-cart')}}">
                                <span class="icon_bag_alt" style="color: #fff"></span>
                                <div id="carts">
                                    @if(session('CART'))
                                    <div class="tip" id="bag-carts">
                                        {{count(session('CART'))}}
                                    </div>
                                    @endif
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="canvas__open">
        <i class="fa fa-bars"></i>
    </div>
    </div>
</header>
<section class="favorite_list">
    <div class="notiProduct-item addCart-alert-animate">
        <p>Đã thêm vào danh sách yêu thích </p>
        <a href="{{route('favorite-list')}}" class="btn-hover-dark">Xem danh sách</a>
    </div>
</section>
<section class="notiProduct">
    <div class="notiProduct-item addCart-alert-animate">
        <p>Đã thêm vào giỏ hàng!</p>
        <a href="{{route('shop-cart')}}" class="btn-hover-dark">Vào giỏ hàng</a>
    </div>
</section>
<section class="bg1">
    <!-- Header Section End -->
            @yield('content_web')

    <!-- Instagram Begin -->
    <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{asset('/web/images/ins1.jpg')}}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">Moon Light</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{asset('/web/images/ins2.webp')}}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">Moon Light</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{asset('/web/images/ins3.jpg')}}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">Moon Light</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{asset('/web/images/ins4.jpg')}}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">Moon Light</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{asset('/web/images/ins5.jpg')}}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">Moon Light</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{asset('/web/images/ins6.jpg')}}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">Moon Light</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Instagram End -->
    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container" style="text-align: center; color: #fff3cd; padding: 10px">
            <div class="footer__social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
            </div>
            <div>
                <p>2023 © Xây dựng bởi Moon Light</p>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form" id="form_search" action="" method="get">
                <input type="text" name="name" id="search_input" placeholder="Tìm kiếm sản phẩm .....">
            </form>
        </div>
        <div id="show_search" style="">
            <div class="list-group" id="show-list" style="overflow: auto;height: 500px;">
                <!-- Here autocomplete list will be display -->
            </div>
        </div>
    </div>
</section>
    <script src="{{asset('/web/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('/web/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/web/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('/web/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('/web/js/mixitup.min.js')}}"></script>
    <script src="{{asset('/web/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('/web/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('/web/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/web/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('/web/js/main.js')}}"></script>
    <script src="{{asset('/web/js/myJavascript.js')}}"></script>
    <script>
        let bg = document.getElementById("bg");
        let moon = document.getElementById("moon");
        let mountain = document.getElementById("mountain");
        let road = document.getElementById("road");
        let text = document.getElementById("text");
        window.addEventListener('scroll',function(){
            var value = window.scrollY;
            bg.style.top = value * 0.5 + 'px';
            moon.style.left = -value * 0.5 + 'px';
            mountain.style.top = -value * 0.2 + 'px';
            road.style.top = value * 0.2 + 'px';
            text.style.top = value * 1 + 'px';
        })
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).on('keyup','#search_input',function(e){
            let searchText = $(this).val();
            if (searchText != " "){
                $.ajax({
                    url: "{{ route('search') }}",
                    method: "get",
                    data: {
                        name: searchText,
                    },
                    success: function (response) {
                        let result =  response.map(value =>{
                            return  '<a href="/product/'+value.id+'" class="list-group-item list-group-item-action border-1"><img style="width: 10%;" src="http://127.0.0.1:8000/'+value.main_image+'" alt=""> &ensp;' +value.name+'</a>'
                        })
                        $("#show-list").html(result);
                    },
                });
            }else {
                $("#show-list").html("");
            }
        });
    </script>
    <script>
        $(document).on('click','.cart-btn', function (e){
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('api.cart.add') }}",
                method: "post",
                data: {
                    id: id,
                },
                success: function (response) {
                    $("#carts").load(' #bag-carts');
                    $('.notiProduct').slideDown('fast');
                    $('.notiProduct').delay(2000).slideUp('fast');
                },
            });
        });
    </script>
    <script>
    $(document).on('click','.order', function (e){
        var id = $(this).attr('id');
        $.ajax({
            url: "{{ route('api.cart.add') }}",
            method: "post",
            data: {
                id: id,
            },
            success: function (response) {
                $("#carts").load(' #bag-carts');
                $('.notiProduct').slideDown('fast');
                $('.notiProduct').delay(2000).slideUp('fast');
            },
        });
    });
    </script>
    <script>
        $(document).on('click','.del-cart', function (){
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('api.cart.delete') }}",
                method: "get",
                data: {
                    id: id,
                },
                success: function (response) {
                    $("#carts").load(' #bag-carts');
                    $("#cart").load(' #data-cart');
                    $("#carts").load(' #bag-carts');
                    $("#total-price").load(' .total-price');

                    {{--$('body').load('{{route('cart')}}');--}}
                },
            });
        });
    </script>
    <script>
        $(document).on('click','.inc', function (){
            let qty  = new Number($(this).attr('name'));
            qty += 1;
            let id = $(this).attr('id');
            $.get("{{ route('api.cart.update') }}",{id: id, qty : qty },function(data){
                $("#cart").load(' #data-cart');
                $("#total-price").load(' .total-price');
            });
        });
        $(document).on('click','.dec', function (){
            let qty  = new Number($(this).attr('name'));
            qty -= 1;
            let id = $(this).attr('id');
            $.get("{{ route('api.cart.update') }}",{id: id, qty : qty },function(data){
                $("#cart").load(' #data-cart');
                $("#total-price").load(' .total-price');
            });
        });
    </script>
    <script>
        $(document).on('click','.heart', function (e){
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ route('api.heart.add') }}",
                method: "get",
                data: {
                    id: id,
                },
                success: function (response) {
                    $("#heart").load(' #like');
                    $('.favorite_list').slideDown('fast');
                    $('.favorite_list').delay(2000).slideUp('fast');
                },
            });
        });
    </script>
<script>
    $(document).on('click','.delete', function (e){
        var id = $(this).attr('id');
        $.ajax({
            url: "{{ route('api.heart.delete') }}",
            method: "get",
            data: {
                id: id,
            },
            success: function (response) {
                $("#heart").load(' #like');
                $('body').load('/favorite')
            },
        });
    });
</script>
<script>
    $(document).on('click','.detail',function(e){
        var id = $(this).attr('id');
        $.ajax({
            url: "{{route('api.view.product')}}",
            method: "get",
            data: {
                id: id,
            },
            success: function (data) {
                var name= data.name;
            $('#imgDetail').html('<img src="http://127.0.0.1:8000/'+data.main_image+'">');
            $('.modal-body .proDes').html(data.content);
            $('.modal-body h3').html(name);
            $('.modal-body h4').html(Number(data.price).toLocaleString('en')+"đ");
            $('.modal-body a').attr('id',data.id);
            },
        });
    });
</script>
</body>
</html>