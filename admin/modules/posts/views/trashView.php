<?php

get_header();

?>
<div id="main-content-wp" class="list-post-page">
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
                            <li class="all"><a href="?mod=posts&action=list">Tất cả <span class="count">(<?php echo $total_public; ?>)</span></a> |</li>
                            <li class="publish"><a href="?mod=posts&action=public">Đã đăng <span class="count">(<?php echo $total_public; ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=posts&action=private">Chờ xét duyệt <span class="count">(<?php echo $total_private; ?>)</span></a></li>
                            <li class="trash"><a href="">Thùng rác <span class="count">(<?php echo $total_trash; ?>)</span></a></li>
                        </ul>
                        <form method="POST" action="?mod=posts&action=search" class="form-s fl-right">
                            <input type="text" name="s" id="s" placeholder="Nhâp tên bài viết">
                            <input type="submit" name="btn-submit" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Chỉnh sửa</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Ảnh</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (!empty($list_post)) {
                                    $i = 0;
                                    foreach ($list_post as $post) {
                                        $i++;

                                ?>

                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $i; ?></h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo $post['title'];  ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a onclick="return confirm('Khôi phục lại bài viết?')" href="?mod=posts&action=updateTrash&id=<?php echo $post['id']; ?>" title="Phục hồi" class="delete"><i class="fa fa-solid fa-upload" aria-hidden="true"></i></a></li>
                                                    <li><a onclick="return confirm('Bạn có chắc muốn xóa vĩnh viễn?')" href="?mod=posts&action=deleteTrashPost&id=<?php echo $post['id']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>

                                            <td><img src="<?php echo $post['image'];  ?>" width="100" height="100" alt=""></td>
                                            <td><span class="tbody-text"><?php echo $post['name'];  ?></span></td>
                                            <td><span class="tbody-text"><?php echo $post['status'];  ?></span></td>
                                            <td><span class="tbody-text"><?php echo $post['creator'];  ?></span></td>
                                            <td><span class="tbody-text"><?php echo $post['create_at'];  ?></span></td>
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
                    <?php if ($total_rows > 0) {
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