<?php
get_header();
?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="?mod=pages&action=add" method="POST">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" value="<?php echo set_value('title'); ?>">
                        <?php echo form_error('title'); ?>
                        <label for="desc">Mô tả</label>
                        <textarea name="desc" id="desc" class="ckeditor"><?php echo set_value('desc'); ?></textarea>
                        <?php echo form_error('desc'); ?>
                        <label for="status">Trạng thái</label>
                        <select name="status" id="status">
                            <option value="">---Chọn trạng thái---</option>
                            <option value="Công khai" <?php if (!empty(set_value('status')) && set_value('status') == "Công khai") echo "SELECTED" ?>>Công khai</option>
                            <option value="Chờ duyệt" <?php if (!empty(set_value('status')) && set_value('status') == "Chờ duyệt") echo "SELECTED" ?>>Chờ duyệt</option>
                        </select>
                        <?php echo form_error('status'); ?>

                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>