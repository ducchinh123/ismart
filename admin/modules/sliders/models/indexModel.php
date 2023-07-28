<?php

function addSlider($data)
{

    return db_insert("tbl_sliders", $data);
}

function get_all_slider()
{

    return db_fetch_array("SELECT * FROM `tbl_sliders` WHERE tbl_sliders.is_trash = 'no'");
}


function totalPublic()
{

    return db_num_rows("SELECT * FROM `tbl_sliders` WHERE `status` = 'Công khai' AND tbl_sliders.is_trash = 'no'");
}
function totalPrivate()
{

    return db_num_rows("SELECT * FROM `tbl_sliders` WHERE `status` = 'Chờ duyệt' AND tbl_sliders.is_trash = 'no'");
}
function totalSlider()
{

    return db_num_rows("SELECT * FROM `tbl_sliders` WHERE tbl_sliders.is_trash = 'no'");
}


function get_list_slider_public()
{

    return db_fetch_array("SELECT * FROM `tbl_sliders` WHERE `status` = 'Công khai' AND tbl_sliders.is_trash = 'no'");
}
function get_list_slider_private()
{

    return db_fetch_array("SELECT * FROM `tbl_sliders` WHERE `status` = 'Chờ duyệt' AND tbl_sliders.is_trash = 'no'");
}


function get_list_slider_by_title($title = "")
{

    return db_fetch_array("SELECT * FROM `tbl_sliders` WHERE `name` LIKE  '%{$title}%'");
}

function totalSearch($title)
{

    return db_num_rows("SELECT * FROM `tbl_sliders` WHERE `name` LIKE  '%{$title}%'");
}


function deleteSlider($id)
{

    return db_delete("tbl_sliders", "`id` = {$id}");
}

function get_info_slider($id)
{

    return db_fetch_row("SELECT * FROM `tbl_sliders` WHERE `id` = {$id}");
}


function updateSlider($data, $id)
{

    return db_update("tbl_sliders", $data, "`id` = {$id}");
}


// trash

function get_all_slider_trash()
{

    return db_fetch_array("SELECT * FROM `tbl_sliders` WHERE tbl_sliders.is_trash = 'yes'");
}

function totalTrash()
{

    return db_num_rows("SELECT * FROM `tbl_sliders` WHERE tbl_sliders.is_trash = 'yes'");
}

function removeTrash($id, $data)
{

    return db_update("tbl_sliders", $data, "`id` = {$id}");
}

// Phân trang
