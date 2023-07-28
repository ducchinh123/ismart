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

    return db_fetch_row("SELECT tbl_image_product.*, tbl_products.id as id_product FROM tbl_image_product INNER JOIN tbl_products
    on tbl_image_product.product_id = tbl_products.id WHERE tbl_image_product.id = {$id} AND tbl_image_product.is_trash = 'no'");
}


function updateImage($data, $id)
{

    return db_update("tbl_image_product", $data, "`id` = {$id}");
}


// trash

function removeTrash($id, $data)
{

    return db_update("tbl_image_product", $data, "`product_id` = {$id}");
}


function get_all_images_trash()
{

    return db_fetch_array("SELECT * FROM `tbl_image_product` INNER JOIN tbl_products
    on tbl_image_product.product_id = tbl_products.id WHERE tbl_image_product.is_trash = 'yes' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
}
function totalTrash()
{

    return db_num_rows("SELECT * FROM `tbl_image_product` INNER JOIN tbl_products
    on tbl_image_product.product_id = tbl_products.id WHERE tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' AND tbl_image_product.is_trash = 'yes'");
}
