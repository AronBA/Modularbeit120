<?php

class LogIn extends Dbh {

    protected function getUser($uname,$upwd){
        $error = 0;

        $query = "SELECT benutzername, admin,passwort from db_m120_modularbeit.benutzer where benutzername = ?";
        $stmt = $this->connect()->prepare($query);

        if($stmt===false){
            $error .= 'prepare() failed '. $this->connect()->error . '<br />';
        }

        if(!$stmt->bind_param("s", $uname)){
            $error .= 'bind_param() failed '. $this->connect()->error . '<br />';
        }

        if(!$stmt->execute()){
            $error .= 'execute() failed '. $this->connect()->error . '<br />';
        }

        $result = $stmt->get_result();

        $result = $stmt->get_result();
        if($result->num_rows){
            $row = $result->fetch_assoc();

            if(password_verify($upwd, $row["password"])){
                $_SESSION['login'] = true;
                $_SESSION['username'] = $row["benutzername"];
                $_SESSION['firstname'] = $row["vorname"];
                $_SESSION["lastname"] = $row["nachname"];
                $_SESSION['admin'] = $row["admin"];
                if ($row["admin"] == "admin") {
                    header("location: ../books.php");

                } else {
                    header("location: ../books.php");
                }
            }
        }
    }
}