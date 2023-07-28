<?php
get_header();
?>

<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Blog</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">

                        <?php

                        if (!empty($list_post)) {

                            foreach ($list_post as $post) {



                        ?>
                                <li class="clearfix">
                                    <a href="bai-viet/<?php echo $post['slug']; ?>.<?php echo $post['id']; ?>.html" title="" class="thumb fl-left">
                                        <img src="admin/<?php echo $post['image']; ?>" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="bai-viet/<?php echo $post['slug']; ?>.<?php echo $post['id']; ?>.html" title="" class="title"><?php echo $post['title']; ?></a>
                                        <span class="create-date"><?php echo $post['create_at']; ?></span>
                                        <p class="desc"><?php echo $post['desc_short']; ?></p>
                                    </div>
                                </li>

                        <?php

                            }
                        }

                        ?>

                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <?php echo get_pagging($num_page, $url, $page); ?>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="selling-wp">

                <?php

                if (!empty($list_bestseller)) {



                ?>
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm bán chạy</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">

                            <?php
                            foreach ($list_bestseller as $bestseller) {

                            ?>
                                <li class="clearfix">
                                    <a href="?page=detail_product" title="" class="thumb fl-left">
                                        <img src="admin/<?php echo $bestseller['main_img']; ?>" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="?page=detail_product" title="" class="product-name"><?php echo $bestseller['name']; ?></a>
                                        <div class="price">
                                            <span class="new"><?php echo currency($bestseller['price_new']); ?></span>
                                            <span class="old"><?php echo currency($bestseller['price_old']); ?></span>
                                        </div>
                                        <a href="" title="" class="buy-now">Mua ngay</a>
                                    </div>
                                </li>

                            <?php
                            }
                            ?>

                        </ul>
                    </div>

                <?php
                }
                ?>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_product" title="" class="thumb">
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