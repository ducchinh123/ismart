<?php get_header(); ?>

<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="gio-hang" title="">Giỏ hàng của bạn</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart']['buy'])) {
    ?>
        <div id="wrapper" class="wp-inner clearfix">
            <div class="section" id="info-cart-wp">
                <div class="section-detail table-responsive">

                    <form action="?mod=carts&action=updateCart" method="post">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Mã sản phẩm</td>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Giá sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td colspan="2">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                if (!empty($cart_buy)) {

                                    foreach ($cart_buy as $buy) {
                                ?>
                                        <tr>
                                            <td><?php echo $buy['code']; ?></td>
                                            <td>
                                                <a href="<?php echo $buy['url']; ?>" title="" class="thumb">
                                                    <img src="admin/<?php echo $buy['thumb']; ?>" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo $buy['url']; ?>" title="" class="name-product"><?php echo $buy['name']; ?></a>
                                            </td>
                                            <td><?php echo currency($buy['price']); ?></td>
                                            <td>
                                                <input type="number" name="num_order" value="<?php echo $buy['qty']; ?>" min="1" class="num-order" data-id="<?php echo $buy['id']; ?>" id="num-order">
                                            </td>
                                            <td id="sub_total-<?php echo $buy['id']; ?>"><?php echo currency($buy['sub_total']); ?></td>
                                            <td>
                                                <a onclick="return confirm('Xóa sản phẩm này khỏi giỏ?')" href="?mod=carts&action=deleteProduct&id=<?php echo $buy['id']; ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <?php

                                if (!empty($cart_info)) {


                                ?>
                                    <tr>
                                        <td colspan="7">
                                            <div class="clearfix">
                                                <p id="total-price" class="fl-right">Tổng giá: <span><?php echo currency($cart_info['total']); ?></span></p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <div class="clearfix">
                                                <div class="fl-right">

                                                    <a href="thanh-toan" title="" id="checkout-cart">Thanh toán</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
            <div class="section" id="action-cart-wp">
                <div class="section-detail">
                    <p class="title">Thực hiện các thay đổi của bạn. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                    <a href="trang-chu.html" title="" id="buy-more">Mua tiếp</a><br />
                    <a onclick="return confirm('Xóa toàn bộ sản phẩm này khỏi giỏ?')" href="?mod=carts&action=deleteCart" title="" id="delete-cart">Xóa giỏ hàng</a>
                </div>
            </div>
        </div>

    <?php
    } else {


    ?>


        <center><img src="https://bizweb.dktcdn.net/100/333/744/themes/723121/assets/empty_cart.png?1591150294321" style="max-width: 100%;" alt=""></center>

    <?php
    }
    ?>
</div>

<script src="public/js/ajax-cart.js"></script>

<?php get_footer(); ?>