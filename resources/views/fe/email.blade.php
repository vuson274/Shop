<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
        .email{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="email">
    <h2>Xin chào <b>{{$name}}</b></h2>
    <p>Cảm ơn quý khách đã tin tưởng sản phẩm của MoonLight.<br>
        Rất mong quý khách sẽ có những trải nghiệm tuyệt vời cùng với những sản phẩm của MoonLight</p>
    <p>Thông tin đơn hàng: </p>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Tổng tiền</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $count = 0;
                ?>
                @foreach($carts as $cart)
                    <?php
                    $count+= 1;
                    ?>
                    <tr>
                        <th scope="row">{{$count}}</th>
                        <td>{{$cart['product']['name']}}</td>
                        <td>{{$cart['quantity']}}</td>
                        <td>{{number_format($cart['product']['price'])}}</td>
                        <td>{{number_format($cart['product']['price']* $cart['quantity'])}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<p>Tổng giá trị đơn hàng : <b>{{number_format($total)}}</b></p>
</body>
</html>