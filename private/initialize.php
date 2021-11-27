<?php

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("INCLUDE_PATH", PRIVATE_PATH . '/includes');

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);
define("BASE_URL", "http://localhost/demo-iat-352/wendi_xiao/PublicArt/");
define("PUBLIC_URL", "http://localhost/demo-iat-352/wendi_xiao/PublicArt/public/");

require_once('helpers/functions.php');
//require_once('database/db.php');
