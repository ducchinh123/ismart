<?php

function get_page_by_id($id)
{

    return db_fetch_row("SELECT * FROM `tbl_pages` WHERE tbl_pages.status = 'Công khai' AND tbl_pages.id ={$id}");
}


function get_list_page()
{

    return db_fetch_array("SELECT tbl_pages.id, tbl_pages.title, tbl_pages.slug FROM `tbl_pages` WHERE tbl_pages.status = 'Công khai' AND tbl_pages.is_trash = 'no'");
}

function get_product_bestseller()
{

    return db_fetch_array("SELECT tbl_products.*, tbl_cate_product.id as cate_id, tbl_cate_product.name as cate_name
    FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id 
    WHERE tbl_products.status = 'Công khai' AND tbl_products.is_bestseller = 'on'");
}
