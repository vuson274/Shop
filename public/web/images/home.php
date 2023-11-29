<div class="home">
    <section class="banner1">
        <img src="assets/img/banner/bg1.jpg" id="bg">
        <img src="assets/img/banner/moon.png" id="moon">
        <img src="assets/img/banner/mountain.png" id="mountain">
        <img src="assets/img/banner/road.png" id="road">
        <h2 id="text">Moon Light</h2>
    </section>
    <!-- Banner Section End -->
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>New product</h4>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">All</li>
                        <?php
                        foreach($categori as $key => $value)
                        {
                            ?>
                            <li data-filter=".<?php echo $value['name']?>"><?php echo $value['name']?></li>
                            <!-- <li data-filter=".<?php echo $value['name']?>"><a href="<?php echo $value['name']?>"><?php echo $value['name']?></a></li> -->
                            <?php
                        }?>
                    </ul>
                </div>
            </div>
            <div class="row property__gallery">
                <?php
                foreach ($produc as $value) {


                    ?>
                    <div  id="product" class="col-lg-3 col-md-4 col-sm-6 mix
                    <?php
                    switch ($value['categories_id']) {
                        case '1':
                            echo 'Ghế';
                            break;
                        case '2':
                            echo 'Bàn';
                            break;
                        case '3':
                            echo 'Tủ';
                            break;
                        case '4':
                            echo 'Giường';
                            break;
                        case '5':
                            echo 'Kệ';
                            break;
                    }
                    ?>">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-id="<?php echo $value['id']; ?>"
                                 data-setbg="<?php echo $value['avatar']; ?>">
                                <!--  <?php
                                switch ($value['status']) {
                                    case '1':
                                        ?>
                            <div class="label new">New</div>
                            <?php
                                        break;
                                    case '2':
                                        ?>
                            <div class="label sale">Sale</div>
                            <?php
                                        break;
                                    case '3':
                                        ?>
                            <div class="label stockout stockblue">Out Of Stock</div>
                            <?php
                                        break;
                                }
                                ?> -->
                                <ul class="product__hover">
                                    <li><a href="#detail" data-toggle="modal" data-target="#detail" class="detail" id="<?php echo $value['id'];?>"><span class="fa fa-eye"></span></a></li>
                                    <li><a  class="heart" id="<?php echo $value['id'];?>"><span class="icon_heart_alt"></span></a></li>
                                    <li><a href="#order" class="order" id="<?php echo $value['id'];?>"><span
                                                    class="icon_bag_alt" type='buy'></span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>
                                    <a
                                            href="index.php?page=product-details&id=<?php echo $value['id']?>"><?php echo $value['name']; ?></a>
                                </h6>
                                <!--<div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div> -->
                                <div class="product__price"><?php echo number_format($value['price'],0,',',','); ?>đ</div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
        <!-- Phân trang  -->
        <?php
        $pagess = ceil($counttt/12);
        ?>

        <div class="col-lg-12 text-center">
            <div class="pagination__option">
                <?php
                for ($i = 1; $i <= $pagess; $i++){
                    ?>
                    <a href="index.php?pages=<?php echo $i; ?>"> <?php echo $i; ?></a>
                    <?php
                }
                ?>
                <a href="index.php?pages=2"><i class="fa fa-angle-right"></i></a>
            </div>
        </div>

    </section>
    <!-- Product Section End -->

    <!-- Banner Section Begin -->
    <section class="banner set-bg" data-setbg="assets/img/banner/aurora.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 m-auto">
                    <div class="banner__slider owl-carousel">
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>The Wooden Collection</span>
                                <h1>The Project Cabinets</h1>
                                <a href="index.php?page=shop">Shop now</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>The Wooden Collection</span>
                                <h1>The Project Chair</h1>
                                <a href="index.php?page=shop">Shop now</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>The Wooden Collection</span>
                                <h1>The Project Bed</h1>
                                <a href="index.php?page=shop">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Trend Section Begin -->
    <section class="trend spad">
        <div class="container">
            <div class="row">
                <!-- NEW -->
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="trend__content">
                        <div class="section-title">
                            <h4>New</h4>
                        </div>
                        <?php
                        foreach($new as $key => $value){?>
                            <div class="trend__item">
                                <div class="trend__item__pic">
                                    <img width="90" height="90" src="<?php echo $value['avatar'] ?>" alt="">
                                </div>
                                <div class="trend__item__text">
                                    <h6><a
                                                href="index.php?page=product-details&id=<?php echo $value['id']?>"><?php echo $value['name']; ?></a>
                                    </h6>
                                    <div class="product__price"><?php echo number_format($value['price'],0,',',',')?>đ
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- SALE -->
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="trend__content">
                        <div class="section-title">
                            <h4>Sale</h4>
                        </div>
                        <?php
                        foreach($sale as $key => $value){?>
                            <div class="trend__item">
                                <div class="trend__item__pic">
                                    <img width="90" height="90" src="<?php echo $value['avatar'] ?>" alt="">
                                </div>
                                <div class="trend__item__text">
                                    <h6><a
                                                href="index.php?page=product-details&id=<?php echo $value['id']?>"><?php echo $value['name']; ?></a>
                                    </h6>
                                    <div class="product__price"><?php echo number_format($value['price'],0,',',',')?>đ
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- OUT OF STOCK -->
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="trend__content">
                        <div class="section-title">
                            <h4>SELL SLOWLY</h4>
                        </div>
                        <?php
                        foreach($oos as $key => $value){
                            ?>
                            <div class="trend__item">
                                <div class="trend__item__pic">
                                    <img width="90" height="90" src="<?php echo $value['avatar'] ?>" alt="">
                                </div>
                                <div class="trend__item__text">
                                    <h6><a
                                                href="index.php?page=product-details&id=<?php echo $value['id']?>"><?php echo $value['name']; ?></a>
                                    </h6>
                                    <div class="product__price"><?php echo number_format($value['price'],0,',',',')?>đ
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                            <div class="col-md-6" style="text-align: center; position:relative;">
                                <h3></h3><br>
                                <h4></h4><br>
                                <div class="product__details__button">

                                    <a href="#order" class="cart-btn" id="" style="position:absolute; left: 20%;"><span class="icon_bag_alt"></span> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    