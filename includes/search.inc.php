<?php
if (isset($_POST["submit"])){
    $text = $_POST["search"];

    header("location: ../index.php?search=$text");
} else if (isset($_POST["filtersearch"])) {
    $text = $_POST["search"];
    $mode = $_POST["mode"];
    $filter = $_POST["filter"];
    header("location: ../index.php?fsearch=$text&filter=$filter&mode=$mode");
}