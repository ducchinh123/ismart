<?php

defined('APPPATH') or exit('Không được quyền truy cập phần này');


// get Module name

function get_module()
{
    global $config;
    $module = isset($_GET['mod']) ? $_GET['mod'] : $config['module_default'];
    return $module;
}


// get Controller name
function get_controller()
{
    global $config;
    $controller = isset($_GET['controller']) ? $_GET['controller'] : $config['controller_default'];
    return $controller;
}

//get Action name
function get_action()
{
    global $config;
    $action = isset($_GET['action']) ? $_GET['action'] : $config['action_default'];
    return $action;
}


function load($type, $name)
{
    if ($type == 'lib')
        $path = LIB . DIRECTORY_SEPARATOR . "{$name}.php";
    if ($type == 'helper')
        $path = HELPER . DIRECTORY_SEPARATOR . "{$name}.php";
    if (file_exists($path)) {
        require "$path";
    } else {
        echo "{$type}:{$name} không tồn tại";
    }
}

/*
* -----------------------------
* callFunction
* -----------------------------
* Gọi đến hàm theo tham số biến
*/

function call_function($list_function = array())
{
    if (is_array($list_function)) {
        foreach ($list_function as $f) {
            if (function_exists($f())) {
                $f();
            }
        }
    }
}



function load_view($name, $data_send = array())
{
    global $data;
    $data = $data_send;
    $path = MODULE . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $name . 'View.php';
    if (file_exists($path)) {
        if (is_array($data)) {

            // show_array($data);
            foreach ($data as $key_data => $v_data) {

                $$key_data = $v_data;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function load_model($name)
{
    $path = MODULE . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $name . 'Model.php';
    if (file_exists($path)) {
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_header($name = '')
{
    global $data;
    if (empty($name)) {
        $name = 'header';
    } else {
        $name = "header-{$name}";
    }
    $path = LAYOUT . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_footer($name = '')
{
    global $data;
    if (empty($name)) {
        $name = 'footer';
    } else {
        $name = "footer-{$name}";
    }
    $path = LAYOUT . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_sidebar($name = '')
{
    global $data;
    if (empty($name)) {
        $name = 'sidebar';
    } else {
        $name = "sidebar-{$name}";
    }
    $path = LAYOUT . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            foreach ($data as $key => $a) {
                $$key = $a;
            }
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}

function get_template_part($name)
{
    global $data;
    if (empty($name))
        return FALSE;
    $path = LAYOUT . DIRECTORY_SEPARATOR . "template-{$name}.php";
    if (file_exists($path)) {
        foreach ($data as $key => $a) {
            $$key = $a;
        }
        require $path;
    } else {
        echo "Không tìm thấy {$path}";
    }
}
