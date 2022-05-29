<?php
if (isset($_GET["cid"])){
    $cid = $_GET["cid"];

    include "../classes/dbh.class.php";
    include "../classes/customer.class.php";
    include "../classes/customercontroller.class.php";





    $customer = new CustomerController();
    $customer->deleteCustomers($cid);


    header("location: ../customer.php");


}