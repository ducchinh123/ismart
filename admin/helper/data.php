<?php

function show_data($data)
{

    if (is_array($data)) {

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
    return false;
}


function get_info($username)
{

    $user = db_fetch_row("SELECT `tbl_users`.`fullname`  FROM `tbl_users` WHERE `username` = '{$username}' ");
    return $user['fullname'];
}
