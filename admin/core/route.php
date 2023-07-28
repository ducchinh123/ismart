<?php

$request_path = MODULE . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR  . "controllers" . DIRECTORY_SEPARATOR . get_controller() . "Controller.php";

if (file_exists($request_path)) {

    require $request_path;
} else {

    echo "Xin lỗi! Có vẻ hệ thống đang có chút ít vấn đề bạn à. Quay lại sau nhé!";
}

$action_name = get_action() . "Action";



call_function(['construct', $action_name]);

// xử lý điều hướng khi chưa đăng nhập
if (!isset($_SESSION['is_login']) && get_action() != "login" && get_action() != "active" && get_action() != "reg" && get_action() != "forget" && get_action() != "recup") {
    redirect_to("?mod=users&controller=index&action=login");
}
