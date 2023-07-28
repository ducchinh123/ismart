<?php

session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// $base_url = "http://localhost/unitop.vn/back-end/php%20master/excerise/bulid-project-mvc/";
$config =  [];
$config['module_default'] = 'home';
$config['controller_default'] = 'index';
$config['action_default'] = 'index';
$config['base_url'] = "http://localhost/unitop.vn/back-end/project_ismart/ismart.com/admin/";
