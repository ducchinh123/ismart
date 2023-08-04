<?php

get_header();

?>

<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Điện thoại</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">

            <?php

            if (!empty($info_product)) {

            ?>
                <form action="gio-hang/san-pham-<?php echo $info_product['id']; ?>.html" method="post">
                    <div class="section" id="detail-product-wp">
                        <div class="section-detail clearfix">
                            <div class="thumb-wp fl-left">
                                <a href="san-pham/<?php echo $info_product['slug']; ?>.<?php echo $info_product['id']; ?>.<?php echo $info_product['id_cate_prod']; ?>.html" title="" id="main-thumb">
                                    <img id="zoom" src="admin/<?php echo $info_product['main_img']; ?>" data-zoom-image="admin/<?php echo $info_product['main_img']; ?>" />
                                </a>
                                <div id="list-thumb">
                                    <?php
                                    if (!empty($thumb_detail)) {


                                    ?>
                                        <a href="" data-image="admin/<?php echo $thumb_detail['thumb_1']; ?>" data-zoom-image="admin/<?php echo $thumb_detail['thumb_1']; ?>">
                                            <img id="zoom" src="admin/<?php echo $thumb_detail['thumb_1']; ?>" />
                                        </a>
                                        <a href="" data-image="admin/<?php echo $thumb_detail['thumb_2']; ?>" data-zoom-image="admin/<?php echo $thumb_detail['thumb_2']; ?>">
                                            <img id="zoom" src="admin/<?php echo $thumb_detail['thumb_2']; ?>" />
                                        </a>
                                        <a href="" data-image="admin/<?php echo $thumb_detail['thumb_3']; ?>" data-zoom-image="admin/<?php echo $thumb_detail['thumb_3']; ?>">
                                            <img id="zoom" src="admin/<?php echo $thumb_detail['thumb_3']; ?>" />
                                        </a>

                                        <a href="" data-image="admin/<?php echo $thumb_detail['thumb_4']; ?>" data-zoom-image="admin/<?php echo $thumb_detail['thumb_4']; ?>">
                                            <img id="zoom" src="admin/<?php echo $thumb_detail['thumb_4']; ?>" />
                                        </a>
                                        <a href="" data-image="admin/<?php echo $thumb_detail['thumb_5']; ?>" data-zoom-image="admin/<?php echo $thumb_detail['thumb_5']; ?>">
                                            <img id="zoom" src="admin/<?php echo $thumb_detail['thumb_5']; ?>" />
                                        </a>

                                        <a href="" data-image="admin/<?php echo $thumb_detail['thumb_6']; ?>" data-zoom-image="admin/<?php echo $thumb_detail['thumb_6']; ?>">
                                            <img id="zoom" src="admin/<?php echo $thumb_detail['thumb_6']; ?>" />
                                        </a>
                                        <a href="" data-image="admin/<?php echo $info_product['main_img']; ?>" data-zoom-image="admin/<?php echo $info_product['main_img']; ?>">
                                            <img id="zoom" src="admin/<?php echo $info_product['main_img']; ?>" />
                                        </a>
                                    <?php


                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="thumb-respon-wp fl-left">
                                <img src="public/images/img-pro-01.png" alt="">
                            </div>




                            <div class="info fl-right">
                                <h3 class="product-name"><?php echo $info_product['name']; ?></h3>
                                <div class="desc">
                                    <?php echo $info_product['desc_short']; ?>
                                </div>
                                <div class="num-product">
                                    <span class="title">Sản phẩm: </span>
                                    <span class="status"><?php echo $info_product['notification']; ?></span>
                                </div>
                                <div class="num-product">
                                    <span class="title">Hiện có: </span>
                                    <span class="status"><?php echo $info_product['number']; ?></span>
                                </div>
                                <p class="price"><?php echo currency($info_product['price_new']); ?></p>
                                <div id="num-order-wp">
                                    <a title="" id="minus"><i class="fa fa-minus"></i></a>
                                    <input type="text" name="num-order" min="1" value="1" id="num-order">
                                    <a title="" id="plus"><i class="fa fa-plus"></i></a>
                                </div>

                                <?php if ($info_product['notification'] == 'Còn hàng') {

                                ?>

                                    <button type="submit" title="Thêm giỏ hàng" name="btn-add-cart" class="add-cart">Thêm giỏ hàng</button>

                                <?php
                                } else {

                                ?>
                                    <button type="submit" title="Thêm giỏ hàng" class="add-cart" disabled>Sản phẩm hết hàng</button>


                                <?php
                                }

                                ?>
                            </div>


                        </div>
                    </div>

                <?php
            }
                ?>
                <div class="section" id="post-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Mô tả sản phẩm</h3>
                    </div>
                    <div class="section-detail">

                        <?php echo $info_product['desc_detail']; ?>
                    </div>
                </div>
                </form>
                <div class="section" id="same-category-wp">
                    <div class="section-head">
                        <h3 class="section-title">Cùng chuyên mục</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">

                            <?php
                            if (!empty($same_kind)) {


                                foreach ($same_kind as $item) {

                            ?>
                                    <li>
                                        <a href="san-pham/<?php echo $item['slug']; ?>.<?php echo $item['id']; ?>.<?php echo $item['id_cate_prod']; ?>.html" title="" class="thumb">
                                            <img src="admin/<?php echo $item['main_img']; ?>">
                                        </a>
                                        <a href="san-pham/<?php echo $item['slug']; ?>.<?php echo $item['id']; ?>.<?php echo $item['id_cate_prod']; ?>.html" title="" class="product-name"><?php echo $item['name']; ?></a>
                                        <div class="price">
                                            <span class="new"><?php echo currency($item['price_new']); ?></span>
                                            <span class="old"><?php echo currency($item['price_old']); ?></span>
                                        </div>
                                        <div class="action clearfix">
                                            <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                            <a href="" title="" class="buy-now fl-right">Mua ngay</a>
                                        </div>
                                    </li>

                            <?php
                                }
                            }
                            ?>

                        </ul>
                    </div>
                </div>
        </div>
        <div class="sidebar fl-left">
            <?php
            get_sidebar();
            ?>
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