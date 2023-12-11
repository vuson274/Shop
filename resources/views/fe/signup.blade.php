<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="" href="{{asset('/web/images/logo2.png')}}">
    <link rel="stylesheet" href="{{asset('/web/css/login.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Moon Light</title>
    <style>
        .show{
            position: relative;
            margin-right: 10px;
            text-align: center;
        }
        .toast-body a{
            text-decoration: none;
            color: #8f2c24;
        }
    </style>
</head>
<body>
<section>
    <img src="{{asset('/web/images/img.jpg')}}" class="bg" alt="">
{{--    <div class="toast show" th:if="${noti}" >--}}
{{--        <div class="toast-header">--}}
{{--            <strong class="me-auto" th:text="${noti}"></strong>--}}
{{--            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>--}}
{{--        </div>--}}
{{--        <div class="toast-body">--}}
{{--            <a th:href="@{/home}">Trở về trang chủ</a>--}}
{{--        </div>--}}
{{--    </div>--}}
    @if(\Illuminate\Support\Facades\Session::has('error'))
        <div class="toast show" >
            <div class="toast-header">
                <strong class="me-auto">{{\Illuminate\Support\Facades\Session::get('error')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                <a th:href="@{/home}">Trở về trang chủ</a>
            </div>
        </div>
    @endif
    <div class="login">
        <h2>Sign Up</h2>
        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="inputBox">
                <input type="text" id="name" placeholder="name"  name="name" required>
            </div>
            <div class="inputBox">
                <input type="email" id="email" placeholder="Email"   name="email" required>
            </div>
            <div class="inputBox">
                <input type="password" id="password"   name="password" placeholder="Password" required>
            </div>
            <div class="inputBox">
                <input type="tel" id="phone"  name="phone" placeholder="Phone" required>
            </div>
            <div class="inputBox">
                <input type="submit"  value="Sign Up" id="btn">
            </div>
        </form>
    </div>
</section>
{{--<script src="@{../cms/js/myjs.js}"></script>--}}
</body>
</html>