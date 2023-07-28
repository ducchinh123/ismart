<?php

get_header();

?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="?mod=posts&action=editPost&id=<?php echo $info_post['id']; ?>" method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" value="<?php echo $info_post['title']; ?>">
                        <?php echo form_error('title'); ?>
                        <label for="desc">Mô tả</label>
                        <textarea name="desc" id="desc" class="ckeditor"><?php echo $info_post['desc_detail']; ?></textarea>
                        <?php echo form_error('desc'); ?>
                        <label for="desc_short">Mô tả ngắn</label>
                        <textarea name="desc_short" id="desc_short"><?php echo $info_post['desc_short']; ?></textarea>
                        <?php echo form_error('desc_short'); ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="thumb" id="upload-thumb">
                            <img src="<?php echo $info_post['image']; ?>">
                        </div>
                        <?php echo form_error('image'); ?>
                        <label>Danh mục cha</label>
                        <select name="parent-Cat">
                            <option value="0">-- Chọn danh mục --</option>
                            <?php

                            foreach ($list_cate as $cate) {

                            ?>

                                <option value="<?php echo $cate['id']; ?>" <?php if (!empty($info_post['id_cate_posts']) && $info_post['id_cate_posts'] == $cate['id']) echo 'SELECTED'; ?>><?php echo str_repeat("|---", $cate['level']) . $cate['name']; ?></option>

                            <?php
                            } ?>

                        </select>
                        <?php echo form_error('parent-Cat'); ?>
                        <label>Trạng thái</label>
                        <select name="status" id="status">
                            <option value="">---Chọn trạng thái---</option>
                            <option value="Công khai" <?php if (!empty($info_post['status']) && $info_post['status'] == "Công khai") echo "SELECTED" ?>>Công khai</option>
                            <option value="Chờ duyệt" <?php if (!empty($info_post['status']) && $info_post['status'] == "Chờ duyệt") echo "SELECTED" ?>>Chờ duyệt</option>
                        </select>
                        <?php echo form_error('status'); ?>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();

?>