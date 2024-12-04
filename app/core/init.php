<?php
spl_autoload_register('autoload');
function autoload($class) {
    $file = __DIR__ .'/../models/'. $class . ".php";
    require $file;
}


require ("config.php");
require "functions.php";
require ("Database.php");
require "Model.php";
require 'Controller.php';
require ("App.php");