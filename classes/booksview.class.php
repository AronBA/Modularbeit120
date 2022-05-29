<?php
class BooksView extends Books {

    public function showBooks(){
        $result = $this->getBooks();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $text = $row["title"];
                $autor = $row["autor"];
                $username = $row["kurztitle"];
                $id = $row["id"];


                if ($autor == " "){
                    $autor = "anom";
                }
                if(strlen($text) > 200) {
                    $text = substr($text, 0, 200) . "...";
                }
                echo "
                        <div class='card text-white border-secondary'>
                            <div class='card-body'>
                            <h5 class='card-title'>$username</h5>
                            <h6 class='card-subtitle mb-2 text-muted'>by $autor</h6>
                            <p class='card-text'> $text </p>
                                <div class='cardfooter'>
                                 <a href='books.php?mode=info&book=$id' data-bs-toggle='tooltip' title='More details about the book'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-info-square' viewBox='0 0 16 16'>
                                <path d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>                                  <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/></svg></a>
                             
                                </div>
                            </div>
                        </div>";
            }
        } else {
            echo "0 results";
        }
    }

    public function infoBook($id){
        $result = $this->getBook($id);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $text = $row["title"];
                $autor = $row["autor"];
                $title = $row["kurztitle"];
                $number = $row["nummer"];
                $sold = $row["verkauft"];
                $amount =$row["kaufer"];

                $category =  $this->getBookCategory($row["kategorie"])->fetch_assoc()["kategorie"];


                if ($autor == " "){
                    $autor = "anom";
                }
                if ($sold == 0){
                    $amount = "N/A";
                }


                echo "
                        <div class='overlay'> 
                            <div class='card text-white border-secondary'>
                                <div class='card-body'>
                                <a href='books.php' class='closebtn' >&times;</a>
                                <h5 class='card-title'>$title</h5>
                                
                          
                              
                                <h6 class='card-subtitle mb-2 text-muted'>
                                Nr: $number <br>
                                Autor: $autor <br>
                                Categoriy: $category <br>
                                Sold: $amount <br>
                           
                               </h6>
                                <p class='card-text'> $text </p>
                                
                                </div>
                            <div>
                        </div>
                        
                        ";
            }
        } else {
            echo "0 results";
        }
    }

    public function showSearchedBooks($input){
        $result = $this->searchBook($input);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $text = $row["title"];
                $autor = $row["autor"];
                $username = $row["kurztitle"];
                $id = $row["id"];


                if ($autor == " "){
                    $autor = "anom";
                }
                if(strlen($text) > 200) {
                    $text = substr($text, 0, 200) . "...";
                }
                echo "
                        <div class='card text-white border-secondary'>
                            <div class='card-body'>
                            <h5 class='card-title'>$username</h5>
                            <h6 class='card-subtitle mb-2 text-muted'>by $autor</h6>
                            <p class='card-text'> $text </p>
                                <div class='cardfooter'>
                                 <a href='books.php?mode=info&book=$id' data-bs-toggle='tooltip' title='More details about the book'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-info-square' viewBox='0 0 16 16'>
                                <path d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>                                  <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/></svg></a>
                             
                                </div>
                            </div>
                        </div>";
            }
        } else {
            echo "0 results";
        }
    }
}