<?php
//define the core paths
//Define them as absolute peths to make sure that require_once works as expected

//DIRECTORY_SEPARATOR is a PHP Pre-defined constants:
//(\ for windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define ('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'GCCentrum');

defined('LIB_PATH') ? null : define ('LIB_PATH',SITE_ROOT.DS.'include');

//load the database configuration first.
require_once __DIR__."../config.php";
require_once __DIR__."../function.php";
require_once __DIR__."../session.php";
require_once __DIR__."../accounts.php";
require_once __DIR__."../autonumbers.php";
require_once __DIR__."../products.php";
require_once __DIR__."../stockin.php";
require_once __DIR__."../categories.php";
require_once __DIR__."../sidebarFunction.php"; 
require_once __DIR__."../promos.php";
require_once __DIR__."../customers.php";
require_once __DIR__."../orders.php";
require_once __DIR__."../summary.php";
require_once __DIR__."../settings.php";




require_once __DIR__."../database.php";
?>