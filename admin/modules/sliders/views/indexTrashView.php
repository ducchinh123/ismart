<?php
get_header();

?>

<div id="main-content-wp" class="list-product-page list-slider">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách slider trong thùng</h3>

                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=sliders&action=index">Tất cả <span class="count">(<?php echo $total_slider; ?>)</span></a> |</li>
                            <li class="publish"><a href="?mod=sliders&action=public">Đã đăng <span class="count">(<?php echo $total_public; ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=sliders&action=private">Chờ xét duyệt<span class="count">(<?php echo $total_private; ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=sliders&action=indexTrash">Thùng rác<span class="count">(<?php echo $total_trash; ?>)</span></a></li>
                        </ul>
                        <form method="POST" action="?mod=sliders&action=search" class="form-s fl-right">
                            <input type="text" name="s" id="s" placeholder="Nhập tên slider">
                            <input type="submit" name="btn-submit" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="POST" action="?mod=sliders&action=<?php echo $_GET['action']; ?>" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="2">Xóa khỏi thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">

                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <caption><?php if (isset($total_rows) &&  $total_rows > 0) {
                                            echo "Đang hiển thị: {$count} / {$total_rows} tổng số slider";
                                        } ?></caption>
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Link</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (!empty($list_slider)) {

                                    $i = 0;
                                    foreach ($list_slider as $slider) {
                                        $i++;

                                ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem[<?php echo $slider['id']; ?>]" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $i; ?></h3></span>
                                            <td><span class="tbody-text"><?php echo $slider['name']; ?></h3></span>
                                            <td>
                                                <div class="tbody-thumb">
                                                    <img src="<?php echo $slider['image']; ?>" alt="">
                                                </div>
                                            </td>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo $slider['link']; ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a onclick="return confirm('Khôi phục lại slider này?')" href="?mod=sliders&action=updateTrash&id=<?php echo $slider['id']; ?>" title="Phục hồi" class="delete"><i class="fa fa-solid fa-upload" aria-hidden="true"></i></a></li>
                                                    <li><a onclick="return confirm('Xóa vĩnh viễn khỏi thùng rác?')" href="?mod=sliders&action=delete&id=<?php echo $slider['id']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>

                                            <td><span class="tbody-text"><?php echo $slider['status']; ?></span></td>
                                            <td><span class="tbody-text"><?php echo $slider['creator']; ?></span></td>
                                            <td><span class="tbody-text"><?php echo $slider['create_at']; ?></span></td>
                                        </tr>

                                <?php
                                    }
                                } else {

                                    echo "<p style='color: red;'>Không có slider nào để hiển thị</p>";
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="tfoot-text">Hình ảnh</span></td>
                                    <td><span class="tfoot-text">Link</span></td>
                                    <td><span class="tfoot-text">Trạng thái</span></td>
                                    <td><span class="tfoot-text">Người tạo</span></td>
                                    <td><span class="tfoot-text">Thời gian</span></td>
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