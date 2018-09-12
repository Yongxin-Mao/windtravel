<?php
//here let the page show the error report
ini_set('display_errors', 1);
ini_set('error_reporting()', E_ALL);
//set the session start for every pages.
session_start();
//start the buffer
ob_start();
//define the path
define('APP',__DIR__);
//create the function that load the class file automatically
function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
}
spl_autoload_register('autoload');
