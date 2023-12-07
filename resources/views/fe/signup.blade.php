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
    <img src="{{asset('/web/images/img,jpg')}}" class="bg" alt="">
    <div class="toast show" th:if="${noti}" >
        <div class="toast-header">
            <strong class="me-auto" th:text="${noti}"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            <a th:href="@{/home}">Trở về trang chủ</a>
        </div>
    </div>
    <div class="login">
        <h2>Sign Up</h2>
        <form th:action="@{/createMember}" method="post" th:object="${user}">
            <div class="inputBox">
                <input type="text" id="userName" placeholder="userName" th:field="*{userName}" name="userName" required>
            </div>
            <div class="inputBox">
                <input type="text" id="name" placeholder="fullName"  th:field="*{name}" name="name" required>
            </div>
            <div class="inputBox">
                <input type="email" id="email" placeholder="Email"  th:field="*{email}" name="email" required>
            </div>
            <div class="inputBox">
                <input type="password" id="password"  th:field="*{password}" name="password" placeholder="Password" required>
            </div>
            <div class="inputBox">
                <input type="tel" id="phone"  th:field="*{phone}" name="phone" placeholder="Phone" required>
            </div>
            <div class="inputBox">
                <input type="text" id="address"  th:field="*{address}" name="address" placeholder="Address" required>
            </div>
            <div class="inputBox">
                <input type="date" id="dateOfBirth"  th:field="*{dateOfBirth}" name="dateOfBirth" placeholder="birthDay" required>
            </div>
            <div class="inputBox">
                <input type="submit"  value="Sign Up" id="btn">
            </div>
        </form>
    </div>
</section>
<script src="@{../cms/js/myjs.js}"></script>
</body>
</html>