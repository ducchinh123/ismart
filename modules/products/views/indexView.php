<?php
get_header();
?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title=""><?php echo $cate_name['name']; ?></a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php echo $cate_name['name']; ?></h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị <?php echo $count_; ?> trên <?php echo $total_rows; ?> sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="<?php if ($_GET['action'] == "list") {
                                                            echo "?mod=products&action=list";
                                                        } else if ($_GET['action'] == "index") {
                                                            echo $url;
                                                        } ?>">
                                <select name="select">
                                    <option value="0">Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="4">Giá thấp lên cao</option>
                                </select>
                                <button type="submit" name="btn-filter">Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">

                        <?php

                        if (!empty($list_product)) {
                            foreach ($list_product as $product) {



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
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <?php if (isset($num_page)) {
                        echo get_pagging($num_page, $url, $page);
                    } ?>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <?php get_sidebar(); ?>
            <div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Bộ lọc</h3>
                </div>
                <div class="section-detail">
                    <form method="POST" action="">
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Giá</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>Dưới 500.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>500.000đ - 1.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>1.000.000đ - 5.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>5.000.000đ - 10.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>Trên 10.000.000đ</td>
                                </tr>
                            </tbody>
                        </table>
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Hãng</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Acer</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Apple</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Hp</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Lenovo</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Samsung</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Toshiba</td>
                                </tr>
                            </tbody>
                        </table>
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Loại</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>Điện thoại</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>Laptop</td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
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