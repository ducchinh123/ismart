<?php

function get_info_prod($id)
{

    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `id` = {$id}");
}

function get_list_page()
{

    return db_fetch_array("SELECT tbl_pages.id, tbl_pages.title, tbl_pages.slug FROM `tbl_pages` WHERE tbl_pages.status = 'Công khai'");
}
