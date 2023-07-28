<?php

get_header();

?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật ảnh sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="?mod=thumb-products&action=edit&id=<?php echo $info_image['id']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Ảnh phụ 1</label>
                                <div id="uploadFile">
                                    <input type="file" name="thumb1" id="upload-thumb">
                                    <img src="<?php echo $info_image['img_one']; ?>">
                                </div>
                                <?php echo form_error('image1'); ?>
                                <label for="">Ảnh phụ 2</label>
                                <div id="uploadFile">
                                    <input type="file" name="thumb2" id="upload-thumb">
                                    <img src="<?php echo $info_image['img_two']; ?>">
                                </div>
                                <?php echo form_error('image2'); ?>
                                <label for="">Ảnh phụ 3</label>
                                <div id="uploadFile">
                                    <input type="file" name="thumb3" id="upload-thumb">
                                    <img src="<?php echo $info_image['img_three']; ?>">
                                </div>
                                <?php echo form_error('image3'); ?>
                            </div>
                            <div class="col-md-6">
                                <label for="">Ảnh phụ 4</label>
                                <div id="uploadFile">
                                    <input type="file" name="thumb4" id="upload-thumb">
                                    <img src="<?php echo $info_image['img_four']; ?>">
                                </div>
                                <?php echo form_error('image4'); ?>
                                <label for="">Ảnh phụ 5</label>
                                <div id="uploadFile">
                                    <input type="file" name="thumb5" id="upload-thumb">
                                    <img src="<?php echo $info_image['img_five']; ?>">
                                </div>
                                <?php echo form_error('image5'); ?>
                                <label for="">Ảnh phụ 6</label>
                                <div id="uploadFile">
                                    <input type="file" name="thumb6" id="upload-thumb">
                                    <img src="<?php echo $info_image['img_six']; ?>">
                                </div>
                                <?php echo form_error('image6'); ?>
                            </div>
                        </div>
                        <?php echo form_error('title'); ?>
                        <label>Danh mục cha</label>
                        <select name="parent-Cat">
                            <option value="0">-- Thuộc sản phẩm --</option>
                            <?php foreach ($list_product as $product) {



                            ?>

                                <option value="<?php echo $product['id']; ?>" <?php if (!empty($info_image['product_id']) && $info_image['product_id'] == $product['id']) echo "SELECTED" ?>><?php echo $product['name']; ?></option>

                            <?php
                            } ?>

                        </select>
                        <?php echo form_error('parent-Cat'); ?>
                        <label>Trạng thái</label>
                        <select name="status" id="status">
                            <option value="">---Chọn trạng thái---</option>
                            <option value="Công khai" <?php if (!empty($info_image['status']) && $info_image['status'] == "Công khai") echo "SELECTED" ?>>Công khai</option>
                            <option value="Chờ duyệt" <?php if (!empty($info_image['status']) && $info_image['status'] == "Chờ duyệt") echo "SELECTED" ?>>Chờ duyệt</option>
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