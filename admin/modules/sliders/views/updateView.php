<?php
get_header();
?>

<div id="main-content-wp" class="add-cat-page slider-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa Slider</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data" action="?mod=sliders&action=edit&id=<?php echo $info_slider['id']; ?>">
                        <label for="title">Tên slider</label>
                        <input type="text" name="title" id="title" value="<?php echo $info_slider['name']; ?>">
                        <?php echo form_error('title'); ?>
                        <label for="title">Link</label>
                        <input type="text" name="slug" id="slug" value="<?php echo $info_slider['link']; ?>">
                        <?php echo form_error('slug'); ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="thumb" id="upload-thumb">
                            <img src="<?php if (!empty($info_slider['image'])) {
                                            echo $info_slider['image'];
                                        } else {
                                            echo "./public/images/img-thumb.png";
                                        } ?>">
                        </div>
                        <?php echo form_error('image'); ?>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="">-- Chọn trạng thái --</option>
                            <option value="Công khai" <?php if (!empty($info_slider['status'] && $info_slider['status'] == "Công khai")) echo "SELECTED"; ?>>Công khai</option>
                            <option value="Chờ duyệt" <?php if (!empty($info_slider['status'] && $info_slider['status'] == "Chờ duyệt")) echo "SELECTED"; ?>>Chờ duyệt</option>
                        </select>
                        <?php echo form_error('status'); ?>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>