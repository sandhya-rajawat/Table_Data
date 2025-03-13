<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
include './userdata_fetch.php';

include_once './process.php';
$obj2 =new DataHandle();
$obj2 -> search_pagination();





?>