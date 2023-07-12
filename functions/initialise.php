<?php
SESSION_START();
//Get root paths for files
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("APP_PATH", PROJECT_PATH . '/app/');
define("SHARED_PATH", PROJECT_PATH . '/shared/');
define("IMAGE_PATH", PROJECT_PATH .'/assets/img/');

define("ADMIN",1);
define("AGENT",2);
define("ACCOUNTANT",3);

//Get root paths for urls and linksc
$script_name = $_SERVER['SCRIPT_NAME'];
$public_end = strpos($script_name,'/')+9;
$doc_root = substr($_SERVER['SCRIPT_NAME'],0,$public_end);
define("WWW_ROOT",$doc_root);

require_once(SHARED_PATH.'global_vars.php');
require_once('functions.php');