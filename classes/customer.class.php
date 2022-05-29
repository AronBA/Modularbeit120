<?php
class Customer extends Dbh {

    protected function getCustomers(){
        $query = 'SELECT * from db_m120_modularbeit.kunden limit 20';
        return $this->connect()->query($query);
    }
    protected function getdeletecustomer($cid){
        $query = "DELETE FROM db_m120_modularbeit.kunden WHERE kid = ?";

        $stmt = $this->connect()->prepare($query);
        $stmt->bind_param("s", $cid );
        $stmt->execute();
    }
}