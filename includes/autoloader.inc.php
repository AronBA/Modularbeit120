<?php
spl_autoload_register("loader");

function loader($classname){
    $path = "classes/";
    $ext = ".class.php";
    $fullpath = $path . $classname . $ext;

    if (!file_exists($fullpath)){
        return false;
    }
    include_once $fullpath;
}

