<?php
get_header();
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">

                    <?php if (!empty($list_slider)) {

                        foreach ($list_slider as $slider) {



                    ?>
                            <div class="item">
                                <img src="admin/<?php echo $slider['image']; ?>" alt="">
                            </div>
                    <?php
                        }
                    } ?>

                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>

            <?php
            if (!empty($list_featured)) {
            ?>
                <div class="section" id="feature-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm nổi bật</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">

                            <?php



                            foreach ($list_featured as $featured) {



                            ?>
                                <li>
                                    <a href="san-pham/<?php echo $featured['slug']; ?>.<?php echo $featured['id']; ?>.<?php echo $featured['cate_id']; ?>.html" title="" class="thumb">
                                        <img src="admin/<?php echo $featured['main_img']; ?>">
                                    </a>
                                    <a href="san-pham/<?php echo $featured['slug']; ?>.<?php echo $featured['id']; ?>.<?php echo $featured['cate_id']; ?>.html" title="" class="product-name"><?php echo $featured['name']; ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency($featured['price_new']); ?></span>
                                        <span class="old"><?php echo currency($featured['price_old']); ?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="gio-hang/san-pham-<?php echo $featured['id']; ?>.html" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="thanh-toan/san-pham-<?php echo $featured['id'] ?>.html" title="" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>

                            <?php
                            }

                            ?>

                        </ul>
                    </div>
                </div>

            <?php } ?>
            <div class="section" id="list-product-wp">
                <?php
                if (!empty($list_item)) {

                    foreach ($list_item as $item) {


                ?>

                        <div class="section-head">
                            <h3 class="section-title"><?php echo $item['cate_name']; ?></h3>
                        </div>
                        <div class="section-detail">
                            <ul class="list-item clearfix">

                                <?php

                                if (!empty($item['product'])) {

                                    foreach ($item['product'] as $product) {


                                ?>
                                        <li>
                                            <a href="san-pham/<?php echo $product['slug']; ?>.<?php echo $product['id']; ?>.<?php echo $product['id_cate_prod']; ?>.html" title="" class="thumb">
                                                <img src="admin/<?php echo $product['main_img']; ?>">
                                            </a>
                                            <a href="san-pham/<?php echo $product['slug']; ?>.<?php echo $product['id']; ?>.<?php echo $product['id_cate_prod']; ?>.html" title="" class="product-name"><?php echo $product['name']; ?></a>
                                            <div class="price">
                                                <span class="new"><?php echo currency($product['price_new']); ?></span>
                                                <span class="old"><?php echo currency($product['price_old']); ?></span>
                                            </div>
                                            <div class="action clearfix">
                                                <a href="gio-hang/san-pham-<?php echo $product['id']; ?>.html" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                                <a href="thanh-toan/san-pham-<?php echo $product['id'] ?>.html" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                            </div>
                                        </li>

                                <?php
                                    }
                                }
                                ?>

                            </ul>
                        </div>

                <?php

                    }
                }
                ?>
            </div>

        </div>
        <div class="sidebar fl-left">
            <?php
            get_sidebar();
            ?>

            <?php

            if (!empty($list_bestseller)) {

            ?>
                <div class="section" id="selling-wp">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm bán chạy</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">

                            <?php


                            foreach ($list_bestseller as $bestseller) {



                            ?>
                                <li class="clearfix">
                                    <a href="san-pham/<?php echo $bestseller['slug']; ?>.<?php echo $bestseller['id']; ?>.<?php echo $bestseller['cate_id']; ?>.html" title="" class="thumb fl-left">
                                        <img src="admin/<?php echo $bestseller['main_img']; ?>" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="san-pham/<?php echo $bestseller['slug']; ?>.<?php echo $bestseller['id']; ?>.<?php echo $bestseller['cate_id']; ?>.html" title="" class="product-name"><?php echo $bestseller['name']; ?></a>
                                        <div class="price">
                                            <span class="new"><?php echo currency($bestseller['price_new']); ?></span>
                                            <span class="old"><?php echo currency($bestseller['price_old']); ?></span>
                                        </div>
                                        <a href="thanh-toan/san-pham-<?php echo $bestseller['id'] ?>.html" title="" class="buy-now">Mua ngay</a>
                                    </div>
                                </li>

                            <?php
                            }

                            ?>
                        </ul>
                    </div>
                </div>

            <?php } ?>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>