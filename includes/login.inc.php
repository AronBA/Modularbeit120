<?php
require_once "session.inc.php";

include "../DB_config.php";






$error = '';
$message = '';



echo "test";

// validierung des Loginprozesses
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)){
    $mysqli = new mysqli(HOST,USER,PASSWORD,DATABASE);


    if(!empty(trim($_POST['uname']))){
        $username = trim($_POST['uname']);


        if(!preg_match("/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{4,}/", $username) || strlen($username) > 30) {
            header('Location: ../index.php?msg=31');
        }
    } else {
        header('Location: ../index.php?msg=30');
    }

    if(!empty(trim($_POST['pwd']))){
        $password = trim($_POST['pwd']);
        if(!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $password)){
            header('Location: ../index.php?msg=41');
        }
    } else {
        header('Location: ../index.php?msg=40');
    }

    if(empty($error)){

        $query = "SELECT benutzername, passwort, admin from db_m120_modularbeit.benutzer where benutzername = ?";
        $stmt = $mysqli->prepare($query);



        if($stmt===false){
            $error .= 'prepare() failed '. $mysqli->error . '<br />';
        }

        if(!$stmt->bind_param("s", $username)){
            $error .= 'bind_param() failed '. $mysqli->error . '<br />';
        }

        if(!$stmt->execute()){
            $error .= 'execute() failed '. $mysqli->error . '<br />';
        }

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
