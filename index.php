<?php
include "includes/autoloader.inc.php"
?>

<!DOCTYPE html>
<html lang="en">
<?php
include "includes/header.inc.php";



?>


<?php
if (isset($_GET["msg"])){

    if ($_GET["msg"] == 1){
        echo "<div class='alert alert-success' role='alert'>
        You've been logged out successfully.
</div>";
    } else if ($_GET["msg"] == 2){
        echo "<div class='alert alert-danger' role='alert'>
        Your session has expired or was not set correctly
</div>";
    } else if ($_GET["msg"] == 30){
        echo "<div class='alert alert-warning' role='alert'>
        Your username cannot be empty
</div>";

    }else if ($_GET["msg"] == 31){
        echo "<div class='alert alert-danger' role='alert'>
        Your username does not match the format.
</div>";

    }else if ($_GET["msg"] == 40){
        echo "<div class='alert alert-warning' role='alert'>
        Your password cannot be empty
</div>";

    }else if ($_GET["msg"] == 41){
        echo "<div class='alert alert-danger' role='alert'>
        Your password does not match the format.
</div>";

    }
    else if ($_GET["msg"] == 50){
        echo "<div class='alert alert-danger' role='alert'>
        Your username or your password is incorrect
</div>";

    }



}
?>
>
<body class="login">

<h1>Sign in to Bookshop</h1>
    <div  id=login class='card text-white border-secondary'>
        <div class='card-body'>
            <form action="includes/login.inc.php" method="post">
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="uname">Username</label>
                    <input type="text" name="uname" class="form-control form-control-lg" />
                </div>

                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typePasswordX">Password</label>
                    <input type="password" id="typePasswordX" name="pwd" class="form-control form-control-lg" />
                </div>

                <button class="btn btn-success btn-outline btn-lg px-5" name="submit" type="submit">Login</button>
            </form>



    </div>
</div>


</body>
</html>