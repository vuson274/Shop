@extends('fe.layout')
@section('content_web')
    <div>
        <!-- Breadcrumb Begin -->
        <div class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__links">
                            <a href="{{route('home')}}"><i class="fa fa-home"></i>Trang chủ</a>
                            <span>Bài viết</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->
        <!-- Blog Section End -->
        <section class="blog spad">
            <div class="container">
                <div class="row">
                    @foreach($blog as $item)
                    <div class="col-md-4">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{asset($item->image)}}"></div>
                            <div class="blog__item__text">
                                <h6><a href="{{route('blog.detail',['id'=>$item->id])}}">{{$item->title}}</a></h6>
                                <ul>
                                    <li>by <span>admin</span></li>
                                    <li>{{$item->created_at}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
{{--            Phân trang--}}
            <div style="display:flex; justify-content: center;">
                {{$blog->links()}}
            </div>

        </section>
    </div>
@endsection