@extends('fe.layout')
@section('content_web')
        <!doctype html>
<html lang="en" xmlns:th="http://www.thymeleaf.org"
      xmlns:layout="http://www.ultraq.net.nz/thymeleaf/layout"
      layout:decorate="~{fragments}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Moon Light</title>

</head>
<body>
<div layout:fragment="content">
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a th:href="@{/home}"><i class="fa fa-home"></i>Trang chủ</a>
                        <span>Liên hệ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__address">
                            <h5>Contact info</h5>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> Address</h6>
                                    <p>128 Đường Hồ Tùng Mậu, Phú Diễn, Cầu Giấy, Hà Nội</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> Phone</h6>
                                    <p><span><a href="tel:0123458888">0123458888</a></span><span><a
                                                    href="tel:0123459999">0123459999</a></span></p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-headphones"></i> Support</h6>
                                    <p><a href="mailto:Support.photography@gmail.com">Support.photography@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.812419450019!2d105.76355471100571!3d21.040190287304704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b60773a811%3A0xe064604bcb54667f!2zMTI4IMSQLiBI4buTIFTDuW5nIE3huq11LCBD4bqndSBEaeG7hW4sIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1701837211513!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
</div>
</body>
</html>
@endsection