<?php
function get_all_cate()
{

    return db_fetch_array('SELECT * FROM `tbl_cate_product` WHERE tbl_cate_product.is_trash = "no"');
}
function get_all_cate_trash()
{

    return db_fetch_array('SELECT * FROM `tbl_cate_product` WHERE tbl_cate_product.is_trash = "yes"');
}

function addCate($data)
{

    return db_insert("tbl_cate_product", $data);
}

function delete_cate($id, $data)
{

    return db_update("tbl_cate_product", $data, "`id`={$id}");
}
function delete_cate_trash($id)
{

    return db_delete("tbl_cate_product", "`id`={$id}");
}

function get_info_cate($id)
{

    return db_fetch_row("SELECT * FROM `tbl_cate_product` WHERE `id` = {$id}");
}

function updateCate($data, $id)
{

    return db_update("tbl_cate_product", $data, "`id` = {$id}");
}


function addProduct($data)
{

    return db_insert("tbl_products", $data);
}

function get_all_product()
{

    return db_fetch_array("SELECT tbl_products.*,  tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name
    FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id WHERE tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
}
function get_list_product_public()
{

    return db_fetch_array("SELECT tbl_products.*,  tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name
    FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id WHERE tbl_products.status = 'Công khai' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
}
function get_list_product_private()
{

    return db_fetch_array("SELECT tbl_products.*,  tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name
    FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id WHERE tbl_products.status = 'Chờ duyệt' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
}

function deleteProduct($id)
{

    return db_delete("tbl_products", "`id` = {$id}");
}


function totalPublic()
{

    return db_num_rows("SELECT * FROM `tbl_products` WHERE `status` = 'Công khai' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
}
function totalPrivate()
{

    return db_num_rows("SELECT * FROM `tbl_products` WHERE `status` = 'Chờ duyệt' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
}
function totalProduct()
{

    return db_num_rows("SELECT * FROM `tbl_products` WHERE tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
}

function get_info_prod($id)
{

    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `id` = {$id}");
}


function updateProduct($data, $id)
{

    return db_update("tbl_products", $data, "`id`={$id}");
}


function get_list_product_by_title($value = "")
{

    return db_fetch_array("SELECT tbl_products.*, tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name FROM `tbl_products` 
    INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id WHERE tbl_products.name LIKE '%$value%'
    or tbl_products.code LIKE '%$value%'");
}


// lấy số lượng
function totalCateProduct()
{

    return db_num_rows("SELECT * FROM `tbl_cate_product` WHERE tbl_cate_product.is_trash = 'no'");
}
function totalCateTrashProduct()
{

    return db_num_rows("SELECT * FROM `tbl_cate_product` WHERE tbl_cate_product.is_trash = 'yes'");
}
// end slg

function updateProduct_display($id, $data)
{

    return db_update("tbl_products", $data, "`id_cate_prod` = {$id}");
}

// remove prod

function update_prod($id, $data)
{

    return db_update("tbl_products", $data, "`id` = $id");
}

// lấy tất cả sản phẩm trong thùng

function get_all_prod_trash()
{

    return db_fetch_array("SELECT `tbl_products`.*, tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name FROM `tbl_products` INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id WHERE tbl_products.display <> 'none' AND tbl_products.is_trash = 'yes'");
}


function totalProductTrash()
{

    return db_num_rows("SELECT `tbl_products`.*, tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name FROM `tbl_products` INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id WHERE tbl_products.display <> 'none' AND tbl_products.is_trash = 'yes'");
}

function deleteImageProd($id)
{

    return db_delete("tbl_image_product", "`product_id`={$id}");
}


function get_info_image($id)
{

    return db_fetch_row("SELECT tbl_image_product.*, tbl_products.id as id_product FROM tbl_image_product INNER JOIN tbl_products
    on tbl_image_product.product_id = tbl_products.id WHERE tbl_image_product.product_id = {$id} AND tbl_image_product.is_trash = 'no'");
}
