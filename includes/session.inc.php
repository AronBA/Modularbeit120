<?php
session_start();
session_regenerate_id();


if (basename($_SERVER['SCRIPT_FILENAME']) == "customer.php"){
    if (!isset($_SESSION["admin"])){
        header("location: index.php?msg=2");
    }
}
