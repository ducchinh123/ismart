<?php

get_header();

?>

<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=orders&action=index">Tất cả <span class="count">(<?php echo $total_order; ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=orders&action=indexTrash">Thùng rác<span class="count">(<?php echo $total_order_trash; ?>)</span></a></li>
                        </ul>
                        <form method="POST" action="?mod=orders&action=index" class="form-s fl-right">
                            <input type="text" name="s" id="s" placeholder="Nhập mã đơn...">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="POST" action="?mod=orders&action=index" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">

                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <caption><?php if (isset($total_rows) && $total_rows > 0) {
                                            echo "Đang hiển thị: {$count_} / {$total_rows} tổng số đơn";
                                        } ?></caption>
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã đơn hàng</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Số sản phẩm</span></td>
                                    <td><span class="thead-text">Tổng giá</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Chi tiết</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (!empty($list_order)) {
                                    $i = 0;
                                    foreach ($list_order as $order) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem[<?php echo $order['id']; ?>]" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $i; ?></h3></span>
                                            <td><span class="tbody-text"><?php echo $order['code_order']; ?></h3></span>
                                            <td>
                                                <div class="tb-title fl-left">
                                                    <a href="?mod=orders&action=detail&id=<?php echo $order['id']; ?>" title=""><?php echo $order['fullname']; ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="?mod=orders&action=detail&id=<?php echo $order['id']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a onclick="return confirm('Di chuyển đơn hàng vào thùng rác?')" href="?mod=orders&action=delete&id=<?php echo $order['id']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text"><span style="font-weight: bold; padding: 2px 10px; border-radius: 30px ;background: #0951A1;" class="num_order"><?php echo $order['num_order']; ?></span></td>
                                            <td><span class="tbody-text"><span style="padding: 5px 5px; background: #51B848; border-radius: 10px; color: #FFFFFF;"><?php echo currency($order['total']); ?></span></span></td>
                                            <td><span class="tbody-text"><?php echo $order['status']; ?></span></td>
                                            <td><span class="tbody-text"><?php echo $order['create_at']; ?></span></td>
                                            <td><a href="?mod=orders&action=detail&id=<?php echo $order['id']; ?>" title="" class="tbody-text">Chi tiết</a></td>
                                        </tr>
                                <?php }
                                } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text">Mã đơn hàng</span></td>
                                    <td><span class="tfoot-text">Họ và tên</span></td>
                                    <td><span class="tfoot-text">Số sản phẩm</span></td>
                                    <td><span class="tfoot-text">Tổng giá</span></td>
                                    <td><span class="tfoot-text">Trạng thái</span></td>
                                    <td><span class="tfoot-text">Thời gian</span></td>
                                    <td><span class="tfoot-text">Chi tiết</span></td>
                                </tr>
                            </tfoot>
                        </table>

                        </form>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <?php if (isset($total_rows) &&  $total_rows > 0) {
                        echo get_pagging($num_page, $url, $page);
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>