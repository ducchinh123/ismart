<?php

function get_all_slider()
{

    return db_fetch_array("SELECT * FROM `tbl_sliders` WHERE tbl_sliders.status = 'Công khai' AND tbl_sliders.is_trash = 'no'");
}

function get_all_cate()
{

    return db_fetch_array('SELECT * FROM `tbl_cate_product` WHERE tbl_cate_product.status = "Công khai" AND tbl_cate_product.is_trash = "no"');
}


function get_cate($ids)
{

    return db_fetch_array("SELECT tbl_cate_product.name FROM `tbl_cate_product` WHERE id in($ids)");
}


function get_product_bestseller()
{

    return db_fetch_array("SELECT tbl_products.*, tbl_cate_product.id as cate_id, tbl_cate_product.name as cate_name
    FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id 
    WHERE tbl_products.status = 'Công khai' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' AND tbl_products.is_bestseller = 'on'");
}

function get_product_featured()
{

    return db_fetch_array("SELECT tbl_products.*, tbl_cate_product.id as cate_id, tbl_cate_product.name as cate_name
    FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id 
    WHERE tbl_products.status = 'Công khai' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' AND tbl_products.is_featured = 'on'");
}


function get_cate_parent_id()
{

    return db_fetch_array("SELECT tbl_cate_product.id, tbl_cate_product.name FROM tbl_cate_product WHERE tbl_cate_product.parent_id = 0");
}


function get_product_by_id_cate($id)
{

    return db_fetch_array("SELECT tbl_products.* FROM tbl_cate_product 
    INNER JOIN tbl_products on tbl_cate_product.id = tbl_products.id_cate_prod AND tbl_products.status = 'Công khai' AND tbl_products.display <> 'none' AND tbl_products.is_trash = 'no' WHERE tbl_cate_product.id in {$id}");
}

function get_list_page()
{

    return db_fetch_array("SELECT tbl_pages.id, tbl_pages.title, tbl_pages.slug FROM `tbl_pages` WHERE tbl_pages.status = 'Công khai'");
}
