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
    <div class="card-columns">

        <?php

        $book = new BooksView();

        if (isset($_GET["search"])){
            $book->showBooks($page,$_GET["search"]);
        } else if (isset($_GET["fsearch"]))
        {
            $book->showBooks($page,$_GET["fsearch"],$_GET["filter"],$_GET["mode"]);
        }
        else{
            $book->showBooks($page);
        }


        if (isset($_GET["mode"]) && $_GET["mode"] == "info"){
            $book->infoBook($_GET["book"]);
        }




        ?>
    </div>
</div>
<script src="static/js/script.js"></script>
</body>
</html>