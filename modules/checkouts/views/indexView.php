<?php get_header(); ?>

<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="/" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <form action="thanh-toan" method="post">
        <div id="wrapper" class="wp-inner clearfix">
            <div class="section" id="customer-info-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin khách hàng</h1>
                </div>
                <div class="section-detail">
                    <form method="POST" action="" name="form-checkout">
                        <div class="form-row clearfix">
                            <div class="form-col fl-left">
                                <label for="fullname">Họ tên</label>
                                <input type="text" name="fullname" id="fullname" value="<?php echo set_value("fullname"); ?>" placeholder="Họ và tên của khách hàng...">
                                <?php echo form_error("fullname"); ?>
                            </div>
                            <div class="form-col fl-right">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" value="<?php echo set_value("email"); ?>" placeholder="Email nhận thông báo">
                                <?php echo form_error("email"); ?>
                            </div>
                        </div>
                        <div class="form-row clearfix">
                            <div class="form-col fl-left">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" id="address" value="<?php echo set_value("address"); ?>" placeholder="Ghi rõ địa chỉ nhận hàng...">
                                <?php echo form_error("address"); ?>
                            </div>
                            <div class="form-col fl-right">
                                <label for="phone">Số điện thoại</label>
                                <input type="tel" name="phone" id="phone" value="<?php echo set_value("phone"); ?>" placeholder="Số điện thoại mua hàng...">
                                <?php echo form_error("phone"); ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col">
                                <label for="notes">Ghi chú</label>
                                <textarea name="note" placeholder="Nếu có..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="section" id="order-review-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin đơn hàng</h1>
                </div>
                <div class="section-detail">
                    <table class="shop-table">
                        <thead>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Hình ảnh</td>
                                <td>Tổng</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart']['buy'])) { ?>
                                <?php foreach ($_SESSION['cart']['buy'] as $item) { ?>
                                    <tr class="cart-item">
                                        <td class="product-name"><?php echo $item['name']; ?><strong class="product-quantity">x 1</strong></td>
                                        <td><img width="100" height="100" src="admin/<?php echo $item['thumb']; ?>" alt=""></td>
                                        <td class="product-total"><?php echo currency($item['sub_total']); ?></td>
                                    </tr>
                                <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td>Tổng đơn hàng:</td>
                                <td></td>
                                <td><strong class="total-price"><?php echo currency($_SESSION['cart']['info_cart']['total']); ?></strong></td>
                            </tr>
                        </tfoot>
                    <?php } ?>


                    </table>
                    <div id="payment-checkout-wp">
                        <ul id="payment_methods">
                            <li>
                                <input type="radio" id="direct-payment" name="payment-method" value="direct-payment" <?php if (set_value("payMethod") == "direct-payment") echo "checked"; ?>>
                                <label for="direct-payment">Thanh toán tại cửa hàng</label>
                            </li>
                            <li>
                                <input type="radio" id="payment-home" name="payment-method" value="payment-home" <?php if (set_value("payMethod") == "payment-home") echo "checked"; ?>>
                                <label for="payment-home">Thanh toán tại nhà</label>
                            </li>
                            <?php echo form_error("pay-method"); ?>

                        </ul>
                    </div>
                    <div class="place-order-wp clearfix">
                        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart']['buy'])) { ?>
                            <input type="submit" id="order-now" name="btn-pay" value="Đặt hàng">
                        <?php } else {

                        ?>
                            <input type="submit" id="order-now" disabled value="Hết phiên đặt hàng">
                        <?php
                        } ?>
                    </div>


                </div>
            </div>
        </div>
    </form>
</div>
<?php get_footer(); ?>