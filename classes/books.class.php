<?php
class Books extends Dbh {

    protected function getBooks($offset){

        $search = "";
        if ($offset <  0){
            $offset = 0;
        }
        $query = 'SELECT * from db_m120_modularbeit.buecher where id = ? or kurztitle = ? or title = ? or autor = ? limit  20 OFFSET ? ';
        $con = $this->connect();
        $stmt = $con->prepare($query);
        $stmt->bind_param('ssssi', $search,$search,$search,$search,$offset);
        $stmt->execute();


        return $stmt->get_result();
    }

    protected function setBooks($katalog,$nummer,$kurztitle,$kategorie,$verkauft,$kaufer,$autor,$title,$sprache,$foto,$verfasser,$zustand){
        $query = 'INSERT INTO db_m120_modularbeit.buecher(katalog,nummer,kurztitle,kategorie,verkauft,kaufer,autor,title,sprache,foto,verfasser,zustand) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)' ;
        $con = $this->connect();
        $stmt = $con->prepare($query);

        $stmt->bind_param('iisiiissssis', $katalog, $nummer, $kurztitle, $kategorie, $verkauft, $kaufer,$autor,$title,$sprache,$foto,$verfasser,$zustand);
        $stmt->execute();
    }

    protected function getBook($id){
        $query = 'SELECT * from db_m120_modularbeit.buecher where id ='.$id;
        return $this->connect()->query($query);
    }

    protected function getBookCategory($id){
            $query = 'SELECT kategorie from db_m120_modularbeit.kategorien where id ='.$id;
                return $this->connect()->query($query);
    }

    protected function searchBook($input){

    }

}