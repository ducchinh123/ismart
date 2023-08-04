<!DOCTYPE html>
<html>

<head>
    <title>ISMART - CỬA HÀNG CÔNG NGHỆ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost/unitop.vn/back-end/project_ismart/ismart.com/">
    <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="public/style.css" rel="stylesheet" type="text/css" />
    <link href="public/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="public/js/ajax/jquery-3.7.0.min.js" type="text/javascript"></script>
    <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
    <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
    <script src="public/js/main.js" type="text/javascript"></script>
</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">
                        <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="trang-chu.html" title="">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="san-pham/danh-sach-san-pham.html" title="Danh sách">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="bai-viet" title="">Blog</a>
                                </li>

                                <?php
                                if (!empty($list_page)) {

                                    foreach ($list_page as $page) {



                                ?>

                                        <li>
                                            <a href="trang/<?php echo $page['slug']; ?>.<?php echo $page['id']; ?>.html" title=""><?php echo $page['title']; ?></a>
                                        </li>

                                <?php
                                    }
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <a href="trang-chu.html" title="" id="logo" class="fl-left"><img src="public/images/logo.png" /></a>
                        <div id="search-wp" class="fl-left">
                            <form method="POST" action="san-pham/tim-kiem">
                                <input type="text" name="s" class="search-prod" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                <button type="submit" id="sm-s">Tìm kiếm</button>
                            </form>

                            <div id="box-result" class="clearfix">

                                <ul id="list_result" class=""></ul>


                            </div>
                        </div>

                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left">
                                <span class="title">Tư vấn</span>
                                <span class="phone">0987.654.321</span>
                            </div>
                            <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            <div id="cart-wp" class="fl-right">
                                <div id="btn-cart">
                                    <a href="gio-hang" style="padding: 7px;"><i class="fa fa-shopping-cart" style="color: white;" aria-hidden="true"></i></a>
                                    <span id="num"><?php if (isset($_SESSION['cart'])) echo $_SESSION['cart']['info_cart']['num_order']; ?></span>
                                </div>
                                <div id="dropdown">

                                    <?php
                                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart']['buy'])) {
                                    ?>

                                        <p class="desc">Có <span><?php if (isset($_SESSION['cart'])) echo $_SESSION['cart']['info_cart']['num_order']; ?> sản phẩm</span> trong giỏ hàng</p>
                                        <ul class="list-cart">

                                            <?php
                                            foreach ($_SESSION['cart']['buy'] as $buy) {
                                            ?>
                                                <li class="clearfix">
                                                    <a href="" title="" class="thumb fl-left">
                                                        <img src="admin/<?php echo $buy['thumb']; ?>" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="" title="" class="product-name"><?php echo $buy['name']; ?></a>
                                                        <p class="price"><?php echo currency($buy['sub_total']); ?></p>
                                                        <p class="qty">Số lượng: <span><?php echo $buy['qty']; ?></span></p>
                                                    </div>
                                                </li>

                                            <?php
                                            }
                                            ?>

                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right price-box"><?php echo currency($_SESSION['cart']['info_cart']['total']); ?></p>
                                        </div>
                                        <dic class="action-cart clearfix">
                                            <a href="gio-hang" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="thanh-toan" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </dic>
                                    <?php
                                    } else {

                                    ?>
                                        <img src="https://hohoda.vn/Media/Screenshot%202022-08-16%20162443.png" style="max-width: 100%;" alt="">
                                    <?php

                                    }

                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>