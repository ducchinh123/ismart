<?php
get_header();
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php echo $total_customer; ?>)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">

                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Địa chỉ</span></td>
                                    <td><span class="thead-text">Đơn hàng</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if (!empty($list_customer)) {
                                    $i = 0;
                                    foreach ($list_customer as $customer) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem[<?php echo $customer['id']; ?>]" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $i; ?></h3></span>
                                            <td>
                                                <div class="fl-left">
                                                    <a href="" title=""><?php echo $customer['fullname']; ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">

                                                </ul>
                                            </td>
                                            <td><span class="tbody-text"><?php echo $customer['phone']; ?></span></td>
                                            <td><span class="tbody-text"><?php echo $customer['email']; ?></span></td>
                                            <td><span class="tbody-text"><?php echo $customer['address']; ?></span></td>
                                            <td><span class="tbody-text"><span style="font-weight: bold; padding: 2px 10px; border-radius: 30px ;background: #51B848;" class="num_order"><?php echo $customer['num_order']; ?></span></span></td>
                                            <td><span class="tbody-text"><?php echo $customer['create_at']; ?></span></td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-body">STT</span></td>
                                    <td><span class="tfoot-body">Họ và tên</span></td>
                                    <td><span class="tfoot-body">Số điện thoại</span></td>
                                    <td><span class="tfoot-body">Email</span></td>
                                    <td><span class="tfoot-body">Địa chỉ</span></td>
                                    <td><span class="tfoot-body">Đơn hàng</span></td>
                                    <td><span class="tfoot-body">Thời gian</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <?php echo get_pagging($num_page, $url, $page); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

get_footer();

?>