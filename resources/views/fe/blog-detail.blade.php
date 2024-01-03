@extends('fe.layout')
@section('content_web')
    <style>
        .blog__details__desc h1, h2, h3, h4, h5, h6 {
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }
        .blog__details__item img{
            width: 100%;
        }
    </style>
    <div>
        <!-- Breadcrumb Begin -->
        <div class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__links">
                            <a href="{{route('home')}}"><i class="fa fa-home"></i>Trang chủ</a>
                            <a href="{{route('blog')}}">Bài viết</a>
                            <span>{{$post->title}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Blog Details Section Begin -->
        <section class="blog-details spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="blog__details__content">
                            <div class="blog__details__item">
                                <img src="{{asset($post->image)}}" alt="">
                                <div class="blog__details__item__title">
                                    <h4>{{$post->title}}</h4>
                                    <ul>
                                        <li>by <span>admin</span></li>
                                        <li>{{$post->created_at}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog__details__desc">@php echo $post->content; @endphp</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="blog__sidebar">
                            <div class="section-title">
                                <h4>Bài viết mới</h4>
                            </div>
                            @foreach($listNews as $item)
                            <div class="blog__sidebar__item" >
                                <a href="{{route('blog.detail',['id'=>$item->id])}}" class="blog__feature__item">
                                    <div class="blog__feature__item__pic">
                                        <img src="{{asset($item->image)}}" alt="">
                                    </div>
                                    <div class="blog__feature__item__text">
                                        <h6>{{$item->title}}</h6>
                                        <span>{{$item->created_at}}</span>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Details Section End -->
    </div>
@endsection