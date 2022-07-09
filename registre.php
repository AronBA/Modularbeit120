<?php
include "includes/autoloader.inc.php";
include "includes/session.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php
include "includes/header.inc.php"
?>

<body>
<a id="#top"></a>

<?php
include "includes/navbar.inc.php"
?>

<div class="sortpanel">

</div>

<div class="mainpanel">


        <h1>Registrierung</h1>
        <form>
            <label for="uname">Username</label>
            <input type="text" name="uname">
            <br>
            <label for="uname">Firstname</label>
            <input type="text" name="uname">
            <br>
            <label for="uname">Lastname</label>
            <input type="text" name="uname">
            <br>
            <label for="uname">Email</label>
            <input type="text" name="uname">
            <br>
            <label for="uname">Password</label>
            <input type="text" name="uname">
            <br>
            <label for="pwd">Confirm Password</label>
            <input type="password" name="pwd">
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Login</button>
            <br>
        </form>

</div>
<script src="static/js/script.js"></script>
</body>
</html>