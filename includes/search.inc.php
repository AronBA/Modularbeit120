<?php
if (isset($_POST["submit"])){
    $text = $_POST["search"];

    header("location: ../index.php?search=$text");
}