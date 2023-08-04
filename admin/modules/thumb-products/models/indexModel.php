<?php

function get_all_product()
{

    return db_fetch_array("SELECT tbl_products.id, tbl_products.name FROM `tbl_products` WHERE 1");
}

function addImage($data)
{

    return db_insert("tbl_image_product", $data);
}

function get_all_images()
{

    return db_fetch_array("SELECT tbl_image_product.*, tbl_products.name FROM tbl_image_product INNER JOIN tbl_products
    on tbl_image_product.product_id = tbl_products.id WHERE tbl_image_product.is_trash = 'no' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
}

function totalPublic()
{

    return db_num_rows("SELECT tbl_image_product.*, tbl_products.name FROM tbl_image_product INNER JOIN tbl_products
    on tbl_image_product.product_id = tbl_products.id WHERE tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' AND tbl_image_product.status = 'Công khai' AND tbl_image_product.is_trash = 'no'");
}
function totalPrivate()
{

    return db_num_rows("SELECT tbl_image_product.*, tbl_products.name FROM tbl_image_product INNER JOIN tbl_products
    on tbl_image_product.product_id = tbl_products.id WHERE tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' AND tbl_image_product.status = 'Chờ duyệt' AND tbl_image_product.is_trash = 'no'");
}
function totalImage()
{

    return db_num_rows("SELECT tbl_image_product.*, tbl_products.name FROM tbl_image_product INNER JOIN tbl_products
    on tbl_image_product.product_id = tbl_products.id WHERE tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' AND tbl_image_product.is_trash = 'no'");
}


function get_list_image_public()
{

    return db_fetch_array("SELECT tbl_image_product.*, tbl_products.name FROM tbl_image_product INNER JOIN tbl_products
    on tbl_image_product.product_id = tbl_products.id WHERE tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' AND tbl_image_product.status = 'Công khai' AND tbl_image_product.is_trash = 'no'");
}
function get_list_image_private()
{

    return db_fetch_array("SELECT tbl_image_product.*, tbl_products.name FROM tbl_image_product INNER JOIN tbl_products
    on tbl_image_product.product_id = tbl_products.id WHERE tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' AND tbl_image_product.status = 'Chờ duyệt' AND tbl_image_product.is_trash = 'no'");
}

function deleteImage($id)
{

    return db_delete("tbl_image_product", "`id`={$id}");
}
function deleteImageProd($id)
{

    return db_delete("tbl_image_product", "`product_id`={$id}");
}


function get_info_image($id)
{

    return db_fetch_row("SELECT tbl_image_product.id, tbl_image_product.product_id, tbl_image_product.status, tbl_image_product.img_one, 
    tbl_image_product.img_two, tbl_image_product.img_three, tbl_image_product.img_four, 
    tbl_image_product.img_five, tbl_image_product.img_six FROM tbl_image_product WHERE tbl_image_product.id = {$id}");
}


function updateImage($data, $id)
{

    return db_update("tbl_image_product", $data, "`id` = {$id}");
}


// trash

function removeTrash($id, $data)
{

    return db_update("tbl_image_product", $data, "`id` = {$id}");
}


function get_all_images_trash()
{

    return db_fetch_array("SELECT tbl_image_product.id as image_id, tbl_image_product.img_one, 
    tbl_image_product.img_two, tbl_image_product.img_three, tbl_image_product.img_four, 
    tbl_image_product.img_five, tbl_image_product.img_six, tbl_image_product.product_id,
    tbl_image_product.creator, tbl_image_product.create_at, tbl_image_product.status,
    tbl_image_product.is_trash, tbl_products.name  FROM `tbl_image_product` INNER JOIN `tbl_products` on tbl_image_product.product_id = tbl_products.id WHERE 
    tbl_image_product.is_trash = 'yes' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
}
function totalTrash()
{

    return db_num_rows("SELECT * FROM `tbl_image_product` INNER JOIN tbl_products
    on tbl_image_product.product_id = tbl_products.id WHERE tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' AND tbl_image_product.is_trash = 'yes'");
}


// xóa nhiều

function deleteList($ids)
{

    return db_delete("tbl_image_product", " tbl_image_product.id IN ({$ids})");
}

function removeList($ids, $data)
{
    return db_update("tbl_image_product", $data, "tbl_image_product.id IN ({$ids})");
}
