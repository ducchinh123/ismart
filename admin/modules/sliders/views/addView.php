<?php
get_header();
?>

<div id="main-content-wp" class="add-cat-page slider-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm Slider</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data" action="?mod=sliders&action=add">
                        <label for="title">Tên slider</label>
                        <input type="text" name="title" id="title" value="<?php echo set_value('title'); ?>">
                        <?php echo form_error('title'); ?>
                        <label for="title">Link</label>
                        <input type="text" name="slug" id="slug" value="<?php echo set_value('url'); ?>">
                        <?php echo form_error('slug'); ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="thumb" id="upload-thumb">
                            <img src="<?php if (!empty(set_value('image'))) {
                                            echo set_value('image');
                                        } else {
                                            echo "./public/images/img-thumb.png";
                                        } ?>">
                        </div>
                        <?php echo form_error('image'); ?>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="">-- Chọn trạng thái --</option>
                            <option value="Công khai" <?php if (!empty(set_value('status') && set_value('status') == "Công khai")) echo "SELECTED"; ?>>Công khai</option>
                            <option value="Chờ duyệt" <?php if (!empty(set_value('status') && set_value('status') == "Chờ duyệt")) echo "SELECTED"; ?>>Chờ duyệt</option>
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