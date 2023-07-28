<?php

function get_products($sql)
{
    $result = db_fetch_array($sql);
    return $result;
}




function totalPublic()
{

    return db_num_rows("SELECT * FROM `tbl_posts` WHERE `status` = 'Công khai'");
}
function totalPrivate()
{

    return db_num_rows("SELECT * FROM `tbl_posts` WHERE `status` = 'Chờ duyệt'");
}
function totalPost()
{

    return db_num_rows("SELECT * FROM `tbl_posts` WHERE 1");
}

function get_list_post()
{

    return db_fetch_array("SELECT tbl_posts.*,
    tbl_cate_post.name FROM `tbl_posts` INNER JOIN `tbl_cate_post` on tbl_posts.id_cate_posts = tbl_cate_post.id WHERE 1");
}
