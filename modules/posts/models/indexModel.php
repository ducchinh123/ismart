<?php

function get_list_post()
{

    return db_fetch_array("SELECT tbl_posts.id, tbl_posts.title, tbl_posts.image, tbl_posts.desc_short, tbl_posts.slug ,tbl_posts.create_at FROM tbl_posts WHERE tbl_posts.status = 'Công khai' AND tbl_posts.is_trash = 'no' AND tbl_posts.display <> 'none'");
}

function totalPost()
{
    return db_num_rows("SELECT tbl_posts.id, tbl_posts.title, tbl_posts.image, tbl_posts.desc_short, tbl_posts.slug ,tbl_posts.create_at FROM tbl_posts WHERE tbl_posts.status = 'Công khai' AND tbl_posts.is_trash = 'no' AND tbl_posts.display <> 'none'");
}
function get_post_by_id($id)
{

    return db_fetch_row("SELECT tbl_posts.title, tbl_cate_post.name ,tbl_posts.desc_detail ,tbl_posts.create_at FROM tbl_posts INNER JOIN tbl_cate_post ON tbl_posts.id_cate_posts = tbl_cate_post.id WHERE tbl_posts.id = {$id}");
}


function get_list_page()
{

    return db_fetch_array("SELECT tbl_pages.id, tbl_pages.title, tbl_pages.slug FROM `tbl_pages` WHERE tbl_pages.status = 'Công khai'");
}

function get_product_bestseller()
{

    return db_fetch_array("SELECT tbl_products.*, tbl_cate_product.id as cate_id, tbl_cate_product.name as cate_name
    FROM tbl_products INNER JOIN tbl_cate_product on tbl_products.id_cate_prod = tbl_cate_product.id 
    WHERE tbl_products.status = 'Công khai' AND tbl_products.is_bestseller = 'on'");
}
