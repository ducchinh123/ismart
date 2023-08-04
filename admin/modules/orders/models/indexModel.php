<?php

function get_all_order()
{

    return db_fetch_array("SELECT  tbl_orders.id, tbl_orders.code_order, tbl_orders.fullname, tbl_orders.num_order, tbl_orders.total, tbl_orders.status, tbl_orders.create_at FROM `tbl_orders` WHERE 1 AND tbl_orders.is_trash = 'no' ORDER BY tbl_orders.id DESC");
}

function get_total_order_search($code)
{

    return db_num_rows("SELECT tbl_orders.id, tbl_orders.code_order, tbl_orders.fullname, tbl_orders.num_order, tbl_orders.total, tbl_orders.status, tbl_orders.create_at FROM `tbl_orders` WHERE 1 AND tbl_orders.is_trash = 'no' AND tbl_orders.code_order = '{$code}'");
}
function get_order_search($code)
{

    return db_fetch_array("SELECT tbl_orders.id, tbl_orders.code_order, tbl_orders.fullname, tbl_orders.num_order, tbl_orders.total, tbl_orders.status, tbl_orders.create_at FROM `tbl_orders` WHERE 1 AND tbl_orders.is_trash = 'no' AND tbl_orders.code_order = '{$code}'");
}

function get_detail_order($id)
{

    return db_fetch_row("SELECT tbl_orders.code_order, tbl_orders.fullname, tbl_orders.email ,tbl_orders.address, tbl_orders.paymethod, tbl_orders.st_order, tbl_orders.total, tbl_orders.num_order, tbl_orders.detail_order FROM `tbl_orders` WHERE tbl_orders.id = {$id} AND tbl_orders.is_trash = 'no' ");
}

function get_list_customer()
{
    return db_fetch_array("SELECT tbl_orders.id, tbl_orders.fullname,tbl_orders.phone, tbl_orders.email, tbl_orders.address, tbl_orders.num_order, tbl_orders.create_at FROM `tbl_orders` WHERE 1 ORDER BY tbl_orders.fullname ASC");
}

function updateOrder($id, $data)
{

    return db_update("tbl_orders", $data, "`id` = {$id}");
}

// xóa tạm

function remove_order($id, $data)
{

    return db_update("tbl_orders", $data, "`id` = {$id}");
}

function get_all_order_trash()
{

    return db_fetch_array("SELECT  tbl_orders.id, tbl_orders.code_order, tbl_orders.fullname, tbl_orders.num_order, tbl_orders.total, tbl_orders.status, tbl_orders.create_at FROM `tbl_orders` WHERE 1 AND tbl_orders.is_trash = 'yes' ORDER BY tbl_orders.id DESC");
}
function total_order_trash()
{

    return db_num_rows("SELECT  tbl_orders.id, tbl_orders.code_order, tbl_orders.fullname, tbl_orders.num_order, tbl_orders.total, tbl_orders.status, tbl_orders.create_at FROM `tbl_orders` WHERE 1 AND tbl_orders.is_trash = 'yes' ORDER BY tbl_orders.id DESC");
}
// tổng

function total_order()
{

    return db_num_rows("SELECT  tbl_orders.id, tbl_orders.code_order, tbl_orders.fullname, tbl_orders.num_order, tbl_orders.total, tbl_orders.status, tbl_orders.create_at FROM `tbl_orders` WHERE 1 AND tbl_orders.is_trash = 'no' ORDER BY tbl_orders.id DESC");
}

function total_customer()
{

    return db_num_rows("SELECT tbl_orders.fullname,tbl_orders.phone, tbl_orders.email, tbl_orders.address, tbl_orders.num_order, tbl_orders.create_at FROM `tbl_orders` WHERE 1 ORDER BY tbl_orders.fullname ASC");
}

function deleteTrash($id)
{
    return db_delete("tbl_orders", "`id` = {$id}");
}

// xóa nhiều

function deleteList($ids)
{

    return db_delete("tbl_orders", " tbl_orders.id IN ({$ids})");
}

function removeList($ids, $data)
{
    return db_update("tbl_orders", $data, "tbl_orders.id IN ({$ids})");
}
