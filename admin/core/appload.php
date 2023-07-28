<?php

defined("APPPATH") or exit("Không được truy cập vào phần này");

require CONFIG . DIRECTORY_SEPARATOR . "config.php";
require CONFIG . DIRECTORY_SEPARATOR . "autoload.php";
require CONFIG . DIRECTORY_SEPARATOR . "database.php";
require CORE . DIRECTORY_SEPARATOR . "base.php";
require CONFIG . DIRECTORY_SEPARATOR . "email.php";
require LIB . DIRECTORY_SEPARATOR . "database.php";


if (is_array($autoload)) {

    foreach ($autoload as $folders => $files) {


        if (!empty($files)) {

            foreach ($files as $name) {
                load($folders, $name);
            }
        }
    }
}


db_connect($db);

require CORE . DIRECTORY_SEPARATOR . "route.php";
