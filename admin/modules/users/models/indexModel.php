<?php

function user_exists($username, $email)
{

    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' OR  `email` = '{$email}'");
    if ($check_user > 0) {

        return true;
    }

    return false;
}

function email_exists($email)
{

    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `email` = '{$email}'");
    if ($check_user > 0) {

        return true;
    }

    return false;
}

function reset_exists($reset_password)
{

    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `reset_password` = '{$reset_password}'");
    if ($check_user > 0) {

        return true;
    }

    return false;
}


function add_user($data)
{

    return db_insert('tbl_users', $data);
}


function check_active($active_url)
{

    $check_active = db_num_rows("SELECT * FROM `tbl_users` WHERE `active_url` = '{$active_url}' AND  `active` = '0'");

    if ($check_active > 0) {

        return true;
    }

    return false;
}

function is_active($active_url)
{

    $data = [
        "active" => "1"
    ];
    $is_active = db_update("tbl_users", $data, "`active_url` = '{$active_url}'");
}


function delete_account()
{
    // Lấy danh sách các tài khoản chưa được xác thực
    $list_active_none = db_fetch_array("SELECT * FROM `tbl_users` WHERE `active` = '0'");

    // Tính toán thời gian hiện tại trừ đi thời gian tối đa cho phép (ví dụ: 1 phút)
    $maxTime = time() - 60;

    // Duyệt qua danh sách các tài khoản chưa được xác thực
    foreach ($list_active_none as $account) {
        // Nếu thời gian đăng ký của tài khoản lớn hơn thời gian tối đa cho phép
        if ($account['date_active'] < $maxTime) {
            // Xóa tài khoản khỏi cơ sở dữ liệu
            $delete_account = db_delete("tbl_users", "`user_id` = {$account['user_id']}");
        }
    }
}


function check_login($username, $password)
{

    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$password}'");

    if ($check_user > 0) {

        return true;
    } else {
        return false;
    }
}


function log_out()
{

    unset($_SESSION['is_login']);
    unset($_SESSION['username']);
    redirect_to();
}


function edit_reset_password($field_value, $email)
{

    db_update("tbl_users", $field_value, "`email` = '{$email}'");
}

function edit_password($field_value, $reset_password)
{

    db_update("tbl_users", $field_value, "`reset_password` = '{$reset_password}'");
}

// JFii2@fEatqZ3dw

function get_user_by_username($username)
{

    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
    if (!empty($item)) {

        return $item;
    }
}


function update_user_login($username, $data)
{

    db_update('tbl_users', $data, "`username`='{$username}'");
}


function check_password($password)
{

    $check_pass = db_num_rows("SELECT * FROM `tbl_users` WHERE `password` = '{$password}'");

    if ($check_pass > 0) {

        return true;
    }

    return false;
}
