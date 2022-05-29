<?php

class LogIn extends Dbh {

    protected function getUser($uname,$upwd){

        if(!empty(trim($uname))){
            $username = trim($uname);
            echo $username;


            if(!preg_match("/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{4,}/", $username) || strlen($username) > 30) {
                header('Location: ../index.php?msg=31');
            }
        } else {
            header('Location: ../index.php?msg=30');
        }

        if(!empty(trim($upwd))){
            $password = trim($upwd);
            echo $password;
            if(!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $password)){
                header('Location: ../index.php?msg=41');
            }
        } else {
            header('Location: ../index.php?msg=40');
        }

        if(empty($error)){

            $mysqli = $this->connect();
            $stmt = $mysqli->prepare("SELECT benutzername, passwort, admin from db_m120_modularbeit.benutzer where benutzername = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();

            $result = $stmt->get_result();

            if($result->num_rows){
                $row = $result->fetch_assoc();

                if(password_verify($_POST['pwd'], $row["passwort"])){
                    $_SESSION['benutzername'] = $row["benutzername"];
                    $_SESSION['admin'] = $row["admin"];


                    if ($row["admin"]) {
                        header('Location: ../customer.php');

                    } else {
                        header('Location: ../books.php');
                    }

                }


            } else {
                header('Location: ../index.php?msg=50');
            }
        } else {


            header('Location: ../index.php?msg=50');
        }
    }
}