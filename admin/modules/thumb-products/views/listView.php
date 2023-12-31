<?php
get_header();

?>

<div id="main-content-wp" class="list-product-page list-slider">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách ảnh</h3>
                    <a href="?mod=thumb-products&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=thumb-products&action=list">Tất cả <span class="count">(<?php echo $total_image; ?>)</span></a> |</li>
                            <li class="publish"><a href="?mod=thumb-products&action=public">Đã đăng <span class="count">(<?php echo $total_public; ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=thumb-products&action=private">Chờ xét duyệt<span class="count">(<?php echo $total_private; ?>)</span></a></li>
                            <li class="pending"><a href="?mod=thumb-products&action=indexTrash">Thùng rác<span class="count">(<?php echo $total_trash; ?>)</span></a></li>
                        </ul>

                    </div>
                    <div class="actions">
                        <form method="POST" action="?mod=thumb-products&action=<?php echo $_GET['action']; ?>" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">

                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <caption><?php if ($total_rows > 0) {
                                            echo "Đang hiển thị: {$count_} / {$total_rows} tổng số bản ghi";
                                        } ?></caption>
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Ảnh 1</span></td>
                                    <td><span class="thead-text">Ảnh 2</span></td>
                                    <td><span class="thead-text">Ảnh 3</span></td>
                                    <td><span class="thead-text">Ảnh 4</span></td>
                                    <td><span class="thead-text">Ảnh 5</span></td>
                                    <td><span class="thead-text">Ảnh 6</span></td>
                                    <td><span class="thead-text">Sản phẩm</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>



                                </tr>
                            </thead>
                            <tbody>


                                <?php

                                if (!empty($list_image)) {
                                    $i = 0;

                                    foreach ($list_image as $image) {

                                        $i++;
                                ?>

                                        <tr>
                                            <td><input type="checkbox" name="checkItem[<?php echo $image['id'] ?>]" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $i; ?></h3></span>
                                            <td>
                                                <div class="tbody-thumb">
                                                    <img src="<?php echo $image['img_one'] ?>" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="tbody-thumb">
                                                    <img src="<?php echo $image['img_two'] ?>" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="tbody-thumb">
                                                    <img src="<?php echo $image['img_three'] ?>" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="tbody-thumb">
                                                    <img src="<?php echo $image['img_four'] ?>" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="tbody-thumb">
                                                    <img src="<?php echo $image['img_five'] ?>" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="tbody-thumb">
                                                    <img src="<?php echo $image['img_six'] ?>" alt="">
                                                </div>
                                            </td>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo $image['name'] ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="?mod=thumb-products&action=edit&id=<?php echo $image['id']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a onclick="return confirm('Di chuyển vào thùng rác?')" href="?mod=thumb-products&action=removeTrash&id=<?php echo $image['id']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text"><?php echo $image['status'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $image['creator'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $image['create_at'] ?></span></td>


                                        </tr>

                                <?php
                                    }
                                } else {

                                    echo "<p style='color: red;'>Không có ảnh nào để hiển thị</p>";
                                }
                                ?>

                                </tfoot>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <?php if ($total_rows > 0) {
                        echo get_pagging($num_page, $url, $page_);
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();

?>