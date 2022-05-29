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
        $book->showBooks();



            if (isset($_GET["mode"]) && $_GET["mode"] == "info"){
                $book->infoBook($_GET["book"]);
            }
            if (isset($_Get["mode"]) && $_Get["mode"] == "search"){
                $book->showSearchedBooks($_Get["text"]);
            }

        ?>

    </div>
</div>
<script src="static/js/script.js"></script>
</body>
</html>