<?php

get_header();

?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                    <a href="?mod=posts&action=addCate" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>

            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=posts&action=catePost">Tất cả <span class="count">(<?php echo $total_cate; ?>)</span></a> |</li>
                            <li class="trash"><a href="?mod=posts&action=cate_trash">Thùng rác <span class="count">(<?php echo $total_istrash; ?>)</span></a></li>
                        </ul>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
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
                                                    <a href="" title=""><?php echo str_repeat("|---", $cate['level']) . $cate['name']; ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="?mod=posts&action=editCate&id=<?php echo $cate['id']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a onclick="return confirm('❗Lưu ý: Tất cả bài viết thuộc danh mục sẽ bị tạm ẩn.')" href="?mod=posts&action=updateCateTrash_yes&id=<?php echo $cate['id']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
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

                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();

?>