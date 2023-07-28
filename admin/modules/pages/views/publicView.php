<?php
get_header();
?>

<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách trang</h3>
                    <a href="?mod=pages&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=pages&action=list">Tất cả <span class="count">(<?php echo $count; ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=pages&action=pending">Chờ xét duyệt <span class="count">(<?php echo $private; ?>)</span> |</a></li>
                            <li class="trash"><a href="?mod=pages&action=trashcan">Thùng rác <span class="count">(<?php echo $trash; ?>)</span></a></li>
                        </ul>
                        <form action="?mod=pages&action=search" method="POST" class="form-s fl-right">
                            <input type="text" name="keyword" id="s" placeholder="Nhập tên trang">
                            <input type="submit" name="search" value="Tìm kiếm">
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
                            <caption><?php if ($total_rows > 0) {
                                            echo "Đang hiển thị: {$count_} / {$total_rows} tổng số trang";
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

                                if (!empty($listPage)) {
                                    $i = 0;
                                    foreach ($listPage as $page) {
                                        $i++;

                                ?>

                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $i; ?></h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo $page['title']; ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="?mod=pages&action=edit&id=<?php echo $page['id']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a onclick="return confirm('Di chuyển vào thùng rác?')" href="?mod=pages&action=deletetrash&id=<?php echo $page['id']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>

                                            <td><span class="tbody-text"><?php echo $page['status']; ?></span></td>
                                            <td><span class="tbody-text"><?php echo $page['creator']; ?></span></td>
                                            <td><span class="tbody-text"><?php echo $page['create_at']; ?></span></td>
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