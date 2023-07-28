<?php

function get_all_slider()
{

    return db_fetch_array("SELECT * FROM `tbl_sliders` WHERE tbl_sliders.status = 'Công khai'");
}

function get_all_cate()
{

    return db_fetch_array('SELECT * FROM `tbl_cate_product` WHERE tbl_cate_product.status = "Công khai" AND tbl_cate_product.is_trash = "no"');
}

function get_product_by_id_cate($id)
{

    return db_fetch_array("SELECT tbl_cate_product.id as cate_id,tbl_cate_product.name as cate_name, tbl_products.* FROM tbl_cate_product 
    INNER JOIN tbl_products on tbl_cate_product.id = tbl_products.id_cate_prod AND tbl_products.status = 'Công khai' WHERE tbl_cate_product.id in {$id}");
}


function get_name_cate($id)
{

    return db_fetch_row("SELECT tbl_cate_product.id, tbl_cate_product.name FROM tbl_cate_product WHERE tbl_cate_product.id = {$id}");
}


function get_all_product()
{

    return db_fetch_array("SELECT tbl_products.*,  tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name
    FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id WHERE tbl_products.status = 'Công khai' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
}

function totalProduct()
{

    return db_num_rows("SELECT tbl_products.*,  tbl_cate_product.id as id_cate_prod, tbl_cate_product.name as cate_name
    FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id WHERE tbl_products.status = 'Công khai' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no'");
}

function get_list_page()
{

    return db_fetch_array("SELECT tbl_pages.id, tbl_pages.title, tbl_pages.slug FROM `tbl_pages` WHERE tbl_pages.status = 'Công khai'");
}


function get_product_same_kind($id, $id_cate)
{

    return db_fetch_array("SELECT tbl_products.id, tbl_products.name, tbl_products.slug, tbl_products.main_img, tbl_products.price_new, tbl_products.price_old, tbl_products.id_cate_prod FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id
     WHERE tbl_products.status = 'Công khai' AND tbl_products.id_cate_prod = {$id_cate} AND tbl_products.id <> {$id}");
}


function get_info_prod($id)
{

    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `id` = {$id}");
}


function get_thumb_detail($id)
{

    return db_fetch_row("SELECT tbl_image_product.img_one as thumb_1, tbl_image_product.img_two as thumb_2, tbl_image_product.img_three as thumb_3, tbl_image_product.img_four as thumb_4, tbl_image_product.img_five as thumb_5, tbl_image_product.img_six as thumb_6 FROM tbl_image_product WHERE 
    tbl_image_product.status = 'Công khai' AND tbl_image_product.product_id = {$id} AND tbl_image_product.is_trash = 'no'");
}
