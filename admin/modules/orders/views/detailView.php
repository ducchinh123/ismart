<?php
get_header();
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">


                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <ul class="list-item">
                    <li>
                        <h6 class="title">Mã đơn hàng</h6>
                        <span class="detail" style="text-decoration: underline;"><?php if (!empty($order)) {
                                                                                        echo $order['code_order'];
                                                                                    } else {
                                                                                        echo "Không có thông tin";
                                                                                    } ?></span>
                    </li>
                    <li>
                        <h6 class="title">Địa chỉ nhận hàng</h6>
                        <span class="detail" style="text-decoration: underline;"><?php if (!empty($order)) {
                                                                                        echo $order['address'];
                                                                                    } else {
                                                                                        echo "Không có thông tin";
                                                                                    } ?></span>
                    </li>
                    <li>
                        <h6 class="title">Thông tin vận chuyển</h6>
                        <span class="detail" style="text-decoration: underline;"><?php if (!empty($order)) {
                                                                                        if ($order['paymethod'] == "direct-payment") {
                                                                                            echo "Thanh toán tại cửa hàng";
                                                                                        } else {
                                                                                            echo "Thanh toán tại nhà";
                                                                                        }
                                                                                    } else {
                                                                                        echo "Không có thông tin";
                                                                                    } ?></span>
                    </li>
                    <form method="POST" action="?mod=orders&action=detail&id=<?php echo $_GET['id']; ?>">
                        <li>
                            <h6 class="title">Tình trạng đơn hàng</h6>
                            <select name="st_order">
                                <option value='Chờ duyệt' <?php if (!empty($order)) {
                                                                if ($order['st_order'] == "Chờ duyệt") echo "SELECTED";
                                                            } ?>>Chờ duyệt</option>
                                <option value='Đang Vận chuyển' <?php if (!empty($order)) {
                                                                    if ($order['st_order'] == "Đang vận chuyển") echo "SELECTED";
                                                                } ?>>Đang vận chuyển</option>
                                <option value='Thành công' <?php if (!empty($order)) {
                                                                if ($order['st_order'] == "Thành công") echo "SELECTED";
                                                            } ?>>Thành công</option>
                            </select>
                            <input type="submit" name="sm_status" value="Cập nhật đơn hàng">
                        </li>
                    </form>
                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <table class="table info-exhibition">
                        <thead>
                            <tr>
                                <td class="thead-text">STT</td>
                                <td class="thead-text">Ảnh sản phẩm</td>
                                <td class="thead-text">Tên sản phẩm</td>
                                <td class="thead-text">Đơn giá</td>
                                <td class="thead-text">Số lượng</td>
                                <td class="thead-text">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            if (!empty($info_prod)) {
                                $i = 0;
                                foreach ($info_prod as $item) {
                                    $i++;
                            ?>
                                    <tr>
                                        <td class="thead-text"><?php echo $i; ?></td>
                                        <td class="thead-text">
                                            <div class="thumb">
                                                <img src="<?php echo $item['thumb']; ?>" alt="">
                                            </div>
                                        </td>
                                        <td class="thead-text"><?php echo $item['name']; ?></td>
                                        <td class="thead-text"><?php echo currency($item['price']); ?></td>
                                        <td class="thead-text"><?php echo $item['qty']; ?></td>
                                        <td class="thead-text"><span style="padding: 5px 5px; background: #51B848; border-radius: 10px; color: #FFFFFF;"><?php echo currency($item['sub_total']); ?></span></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total">Tổng đơn hàng</span>
                        </li>
                        <li>
                            <span class="total-fee"><?php if (!empty($order)) {
                                                        echo $order['num_order'];
                                                    } else {
                                                        echo "Không có thông tin";
                                                    } ?> sản phẩm</span>
                            <span class="total"><?php if (!empty($order)) {
                                                    echo currency($order['total']);
                                                } else {
                                                    echo "Không có thông tin";
                                                } ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
get_footer();
?>