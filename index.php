<?php

$app_path = __DIR__;
define("APPPATH", $app_path);

$config = "config";
define("CONFIG", APPPATH . DIRECTORY_SEPARATOR . $config);

$core = "core";
define("CORE", APPPATH . DIRECTORY_SEPARATOR . $core);

$helper = "helper";
define("HELPER", APPPATH . DIRECTORY_SEPARATOR . $helper);

$layout = "layout";
define("LAYOUT", APPPATH . DIRECTORY_SEPARATOR . $layout);

$libraries = "libraries";
define("LIB", APPPATH . DIRECTORY_SEPARATOR . $libraries);

$modules = "modules";
define("MODULE", APPPATH . DIRECTORY_SEPARATOR . $modules);

$public = "public";
define("PUBLIC", APPPATH . DIRECTORY_SEPARATOR . $public);

require CORE . DIRECTORY_SEPARATOR . "appload.php";
