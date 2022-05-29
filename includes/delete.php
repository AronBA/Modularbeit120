<?php
if (isset($_GET["cid"])){
    $cid = $_GET["cid"];

    $customer = new CustomerController();
    $customer->deleteCustomers($cid);
    header("location: ../customer.php");


}