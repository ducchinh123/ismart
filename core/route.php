<?php

$request_path = MODULE . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR  . "controllers" . DIRECTORY_SEPARATOR . get_controller() . "Controller.php";

if (file_exists($request_path)) {

    require $request_path;
} else {

    echo "Xin lỗi! Có vẻ hệ thống đang có chút ít vấn đề bạn à. Quay lại sau nhé!";
}

$action_name = get_action() . "Action";

call_function(['construct', $action_name]);
