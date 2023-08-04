<?php


function addPage($data)
{

    return db_insert('tbl_pages', $data);
}


function get_all_page()
{

    $list_page = db_fetch_array("SELECT * FROM `tbl_pages` WHERE is_trash = 'no'");
    return $list_page;
}


function deletePage($id)
{

    return db_delete("tbl_pages", "`id` = {$id}");
}


function get_page_current($id)
{

    return db_fetch_row("SELECT * FROM `tbl_pages` WHERE `id` = {$id}");
}


function edit_page($data, $id)
{

    return db_update("tbl_pages", $data, "`id` = {$id}");
}


function totalPage()
{

    return db_num_rows("SELECT * FROM  `tbl_pages` WHERE is_trash = 'no'");
}
function publicPage()
{

    return db_num_rows("SELECT * FROM  `tbl_pages` WHERE `status` = 'Công khai' AND is_trash = 'no'");
}
function privatePage()
{

    return db_num_rows("SELECT * FROM  `tbl_pages` WHERE `status` = 'Chờ duyệt' AND is_trash = 'no'");
}

function trashPage()
{

    return db_num_rows("SELECT * FROM  `tbl_pages` WHERE is_trash = 'yes'");
}


function get_page_public()
{
    return db_fetch_array("SELECT * FROM  `tbl_pages` WHERE `status` = 'Công khai' AND is_trash = 'no'");
}
function get_page_pending()
{
    return db_fetch_array("SELECT * FROM  `tbl_pages` WHERE `status` = 'Chờ duyệt' AND is_trash = 'no'");
}

function searchPage($keyword)
{
    return db_fetch_array("SELECT * FROM  `tbl_pages` WHERE `title` LIKE '%{$keyword}%'  AND `status` = 'Công khai' AND `is_trash` = 'no'");
}
function searchPrivatePage($keyword)
{
    return db_fetch_array("SELECT * FROM  `tbl_pages` WHERE `title` LIKE '%{$keyword}%'  AND `status` = 'Chờ duyệt' AND `is_trash` = 'no'");
}


function updateTrash($id, $data)
{

    return db_update("tbl_pages", $data, "`id` = {$id}");
}

function trash($id, $data)
{

    return db_update("tbl_pages", $data, "`id` = {$id}");
}


function is_trash()
{

    return db_fetch_array("SELECT * FROM  `tbl_pages` WHERE is_trash = 'yes'");
}


// xóa nhiều

function deleteList($ids)
{

    return db_delete("tbl_pages", " tbl_pages.id IN ({$ids})");
}

function removeList($ids, $data)
{
    return db_update("tbl_pages", $data, "tbl_pages.id IN ({$ids})");
}
