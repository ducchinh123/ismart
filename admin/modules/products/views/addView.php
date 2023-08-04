<?php

get_header();

?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" action="?mod=products&action=add" enctype="multipart/form-data">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product-name" value="<?php echo set_value('title'); ?>">
                        <?php echo form_error("product_name"); ?>
                        <label for="product-name">Số lượng sản phẩm</label>
                        <input type="number" name="product_num" min="1" id="product-name" value="<?php echo set_value('num'); ?>">
                        <?php echo form_error("product_num"); ?>
                        <br>
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product_code" id="product-code" value="<?php echo set_value('code'); ?>">
                        <?php echo form_error("product_code"); ?>
                        <label for="price">Giá cũ sản phẩm (Nếu có)</label>
                        <input type="text" name="priceOld" id="price" value="<?php echo set_value('priceOld'); ?>">
                        <?php echo form_error("priceOld"); ?>
                        <label for="price">Giá mới sản phẩm</label>
                        <input type="text" name="priceNew" id="price" value="<?php echo set_value('priceNew'); ?>">
                        <?php echo form_error("priceNew"); ?>
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc_short" id="desc"><?php echo set_value('desc_short'); ?></textarea>
                        <?php echo form_error("desc_short"); ?>
                        <label for="desc">Chi tiết</label>
                        <textarea name="desc_detail" id="desc" class="ckeditor"><?php echo set_value('desc_detail'); ?></textarea>
                        <?php echo form_error("desc_detail"); ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="thumb" id="upload-thumb">
                            <img src="<?php echo set_value('image'); ?>">
                        </div>
                        <?php echo form_error('image'); ?>
                        <label>Danh mục sản phẩm</label>
                        <select name="parent-Cat">
                            <option value="0">-- Chọn danh mục --</option>
                            <?php foreach ($list_cate as $cate) {



                            ?>

                                <option value="<?php echo $cate['id']; ?>" <?php if (!empty(set_value('parent_id') && set_value('parent_id') == $cate['id'])) echo 'SELECTED'; ?>><?php echo str_repeat("|---", $cate['level']) . $cate['name']; ?></option>

                            <?php
                            } ?>

                        </select>
                        <?php echo form_error('parent-Cat'); ?>
                        <label>Trạng thái</label>
                        <select name="status" id="status">
                            <option value="">---Chọn trạng thái---</option>
                            <option value="Công khai" <?php if (!empty(set_value('status')) && set_value('status') == "Công khai") echo "SELECTED" ?>>Công khai</option>
                            <option value="Chờ duyệt" <?php if (!empty(set_value('status')) && set_value('status') == "Chờ duyệt") echo "SELECTED" ?>>Chờ duyệt</option>
                        </select>
                        <?php echo form_error('status'); ?>
                        <label>Tình trạng</label>
                        <select name="notification" id="status">
                            <option value="">---Chọn tình trạng sản phẩm---</option>
                            <option value="Còn hàng" <?php if (!empty(set_value('notification')) && set_value('notification') == "Còn hàng") echo "SELECTED" ?>>Còn hàng</option>
                            <option value="Hết hàng" <?php if (!empty(set_value('notification')) && set_value('notification') == "Hết hàng") echo "SELECTED" ?>>Hết hàng</option>
                        </select>
                        <?php echo form_error('notification'); ?>

                        <div class="ml-4">
                            <input type="checkbox" class="form-check-input" name="is_bestseller" id="is_bestseller" value="on">
                            <label for="is_bestseller">Là sản phẩm bán chạy</label>
                        </div>
                        <div class="ml-4">
                            <input type="checkbox" class="form-check-input" name="is_featured" id="is_featured" value="on">
                            <label for="is_featured">Là sản phẩm nổi bật</label>
                        </div>

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