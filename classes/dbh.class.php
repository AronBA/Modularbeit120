<?php
include "DB_config.php";
class Dbh{

    private  $host = HOST;
    private  $user = USER;
    private  $pwd = PASSWORD;
    private  $dbName = DATABASE;


    protected  function connect(){
        $mysqli = new mysqli($this->host, $this->user, $this->pwd, $this->dbName);

        if ($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_error . ') ' . $mysqli->connect_error);
        }
        return $mysqli;
    }


}