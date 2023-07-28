<?php

function get_all_cate()
{

    return db_fetch_array('SELECT * FROM `tbl_cate_post` WHERE tbl_cate_post.is_trash = "no"');
}
function get_all_trash()
{

    return db_fetch_array('SELECT * FROM `tbl_cate_post` WHERE tbl_cate_post.is_trash = "yes"');
}


function addCate($data)
{

    return db_insert("tbl_cate_post", $data);
}


function delete_cate($id)
{

    return db_delete("tbl_cate_post", "`id`={$id}");
}

function get_info_cate($id)
{

    return db_fetch_row("SELECT * FROM `tbl_cate_post` WHERE `id` = {$id}");
}


function updateCate($data, $id)
{

    return db_update("tbl_cate_post", $data, "`id` = {$id}");
}


function add_post($data)
{

    return db_insert("tbl_posts", $data);
}

function get_list_post()
{

    return db_fetch_array("SELECT tbl_posts.*,
    tbl_cate_post.name FROM `tbl_posts` INNER JOIN `tbl_cate_post` on tbl_posts.id_cate_posts = tbl_cate_post.id WHERE tbl_posts.is_trash = 'no' AND tbl_posts.display <> 'none'");
}


function deletePost($id)
{

    return db_delete("tbl_posts", "`id`={$id}");
}
function deletePost_Cate($id)
{

    return db_delete("tbl_posts", "`id_cate_posts`={$id}");
}


function get_info_post($id)
{

    return db_fetch_row("SELECT * FROM `tbl_posts` WHERE `id`={$id}");
}


function editPost($id, $data)
{

    return db_update("tbl_posts", $data, "`id`= {$id}");
}
function editPost_cate($id, $data)
{

    return db_update("tbl_posts", $data, "`id_cate_posts`= {$id}");
}


function get_list_post_by_title($title)
{

    return db_fetch_array("SELECT tbl_posts.*,
    tbl_cate_post.name FROM `tbl_posts` INNER JOIN `tbl_cate_post` on tbl_posts.id_cate_posts = tbl_cate_post.id WHERE `title` like '%$title%'");
}


function totalPublic()
{

    return db_num_rows("SELECT * FROM `tbl_posts` WHERE tbl_posts.status = 'Công khai' AND tbl_posts.is_trash = 'no' AND tbl_posts.display <> 'none'");
}
function totalPrivate()
{

    return db_num_rows("SELECT * FROM `tbl_posts` WHERE `status` = 'Chờ duyệt' AND tbl_posts.is_trash = 'no'AND tbl_posts.display <> 'none'");
}
function totalPost()
{

    return db_num_rows("SELECT tbl_posts.*,
    tbl_cate_post.name FROM `tbl_posts` INNER JOIN `tbl_cate_post` on tbl_posts.id_cate_posts = tbl_cate_post.id WHERE tbl_posts.is_trash = 'no' AND tbl_posts.display <> 'none'");
}

function totalTrash()
{

    return db_num_rows("SELECT * FROM `tbl_cate_post` WHERE tbl_cate_post.is_trash = 'yes'");
}
function totalTrashPost()
{

    return db_num_rows("SELECT * FROM `tbl_posts` WHERE tbl_posts.is_trash = 'yes'");
}


function get_list_post_public()
{

    return db_fetch_array("SELECT tbl_posts.*,
    tbl_cate_post.name FROM `tbl_posts` INNER JOIN `tbl_cate_post` on tbl_posts.id_cate_posts = tbl_cate_post.id WHERE tbl_posts.status = 'Công khai' AND tbl_posts.is_trash = 'no' AND tbl_posts.display <> 'none'");
}
function get_list_post_private()
{

    return db_fetch_array("SELECT tbl_posts.*,
    tbl_cate_post.name FROM `tbl_posts` INNER JOIN `tbl_cate_post` on tbl_posts.id_cate_posts = tbl_cate_post.id WHERE tbl_posts.status = 'Chờ duyệt' AND tbl_posts.is_trash = 'no' AND tbl_posts.display <> 'none'");
}

function get_list_trash()
{

    return db_fetch_array("SELECT tbl_posts.*,
    tbl_cate_post.name FROM `tbl_posts` INNER JOIN `tbl_cate_post` on tbl_posts.id_cate_posts = tbl_cate_post.id WHERE  tbl_posts.is_trash = 'yes' AND tbl_posts.display <> 'none' ");
}

function updateTrash($id, $data)
{

    return db_update('tbl_posts', $data, "`id` = $id");
}

function updateTrash_yes($id, $data)
{

    return db_update('tbl_posts', $data, "`id` = $id");
}

function total_cate()
{

    return db_num_rows("SELECT * FROM `tbl_cate_post` WHERE tbl_cate_post.is_trash = 'no'");
}


function updateCate_yes($id, $data)
{

    return db_update("tbl_cate_post", $data, "`id` = $id");
}

function updateCateTrash_no($id, $data)
{

    return db_update("tbl_cate_post", $data, "`id` = $id");
}


// ẩn bài viết