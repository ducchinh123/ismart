<?php

get_header();

?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <a href="?mod=products&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=products&action=index">Tất cả <span class="count">(<?php echo $total_product; ?>)</span></a> |</li>
                            <li class="publish"><a href="?mod=products&action=publicProd">Đã đăng <span class="count">(<?php echo $total_public; ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=products&action=privateProd">Chờ xét duyệt<span class="count">(<?php echo $total_private; ?>)</span> |</a></li>
                            <li class="pending"><a href="">Thùng rác<span class="count">(<?php echo $total_trash; ?>)</span></a></li>
                        </ul>
                        <form method="POST" action="?mod=products&action=searchProduct" class="form-s fl-right">
                            <input type="text" name="s" id="s" placeholder="Nhập tên hoặc mã sản phẩm">
                            <input type="submit" name="btn-submit" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="POST" action="?mod=products&action=<?php echo $_GET['action']; ?>" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="2">Xóa khỏi thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">

                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <caption><?php if (isset($total_rows) &&  $total_rows > 0) {
                                            echo "Đang hiển thị: {$count_} / {$total_rows} tổng số sản phẩm";
                                        } ?></caption>
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá mới</span></td>
                                    <td><span class="thead-text">Giá cũ</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                if (!empty($list_product)) {
                                    $i = 0;
                                    foreach ($list_product as $product) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem[<?php echo $product['id']; ?>]" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $i; ?></h3></span>
                                            <td><span class="tbody-text"><?php echo $product['code']; ?></h3></span>
                                            <td>
                                                <div class="tbody-thumb">
                                                    <img src="<?php echo $product['main_img']; ?>" alt="">
                                                </div>
                                            </td>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo $product['name']; ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a onclick="return confirm('Khôi phục lại sản phẩm?')" href="?mod=products&action=updateTrashProd&id=<?php echo $product['id']; ?>" title="Phục hồi" class="delete"><i class="fa fa-solid fa-upload" aria-hidden="true"></i></a></li>
                                                    <li><a onclick="return confirm('Xóa vĩnh viễn khỏi thùng rác?')" href="?mod=products&action=deleteTrash&id=<?php echo $product['id']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text"><?php echo currency($product['price_new']); ?></span></td>
                                            <td><span class="tbody-text"><?php echo $product['price_old']; ?></span></td>
                                            <td><span class="tbody-text"><?php echo $product['cate_name']; ?></span></td>
                                            <td><span class="tbody-text"><?php echo $product['status']; ?></span></td>
                                            <td><span class="tbody-text"><?php echo $product['creator']; ?></span></td>
                                            <td><span class="tbody-text"><?php echo $product['create_at']; ?></span></td>
                                        </tr>
                                <?php
                                    }
                                } else {

                                    echo "<p style='color: red;'>Thùng rác trống.</p>";
                                }
                                ?>

                            </tbody>

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