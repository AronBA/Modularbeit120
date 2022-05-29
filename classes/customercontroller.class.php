<?php
class Customercontroller extends Customer {


    public function deleteCustomers($cid)
    {
        $this->getdeletecustomer($cid);
    }
}