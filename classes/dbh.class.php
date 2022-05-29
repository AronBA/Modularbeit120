<?php

class Dbh{

    private  $host = "localhost";
    private  $user = "root";
    private  $pwd = "";
    private  $dbName = "db_m120_modularbeit";


    protected  function connect(){
        $mysqli = new mysqli($this->host, $this->user, $this->pwd, $this->dbName);

        if ($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_error . ') ' . $mysqli->connect_error);
        }
        return $mysqli;
    }


}