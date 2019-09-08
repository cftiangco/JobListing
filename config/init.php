<?php
//Session start
session_start();

//Config File
require_once 'config.php';


//include helpers
require_once 'helper/system_helper.php';

//Auto Loader function
function __autoload($class_name) {
    require_once 'lib/'.$class_name.'.php';
}
