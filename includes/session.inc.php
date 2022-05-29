<?php
session_start();
session_regenerate_id();
//redirected den user automatisch


if (basename($_SERVER['SCRIPT_FILENAME']) == "customer.php"){
    if (!$_SESSION["admin"]){
        header("location: index.php?msg=2");
    }
} else {
    if (!$_SESSION["benutzername"]){
        header("location: index.php?msg=2");
    }
}
