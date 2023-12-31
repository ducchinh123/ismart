<?php

get_header();

?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">

                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=products&action=cateProduct">Tất cả <span class="count">(<?php echo $total_cate; ?>)</span></a> |</li>
                            <li class="trash"><a href="?mod=posts&action=cate_trash">Thùng rác <span class="count">(<?php echo $total_cate_trash; ?>)</span></a></li>
                        </ul>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <caption><?php if (isset($total_rows) &&  $total_rows > 0) {
                                            echo "Đang hiển thị: {$count_} / {$total_rows} tổng số danh mục trong thùng";
                                        } ?></caption>
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                if (!empty($list_cate)) {
                                    $i = 0;
                                    foreach ($list_cate as $cate) {
                                        $i++;

                                ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $i; ?></h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo  $cate['name']; ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a onclick="return confirm('Khôi phục lại danh mục sản phẩm?')" href="?mod=products&action=updateCateTrash&id=<?php echo $cate['id']; ?>" title="Phục hồi" class="delete"><i class="fa fa-solid fa-upload" aria-hidden="true"></i></a></li>
                                                    <li><a onclick="return confirm('Xóa vĩnh viễn khỏi thùng rác?')" href="?mod=products&action=deleteCateTrash&id=<?php echo $cate['id']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>

                                            <td><span class="tbody-text"><?php echo $cate['status']; ?></span></td>
                                            <td><span class="tbody-text"><?php echo $cate['creator']; ?></span></td>
                                            <td><span class="tbody-text"><?php echo $cate['create_at']; ?></span></td>
                                        </tr>
                                <?php
                                    }
                                } else {

                                    echo "<p style='color: red;'>Không có dữ liệu để hiển thị.</p>";
                                } ?>

                            </tbody>

                        </table>
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