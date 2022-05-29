<?php
if (isset($_POST["submit"])){

    $text = $_POST["search"];
    header("location: ../books.php?mode=search&text=$text");
}