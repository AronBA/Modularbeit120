<?php
class Books extends Dbh {

    protected function getBooks(){
        $query = 'SELECT * from db_m120_modularbeit.buecher limit 20';
        return $this->connect()->query($query);
    }

    protected function setBooks($katalog,$nummer,$kurztitle,$kategorie,$verkauft,$kaufer,$autor,$title,$sprache,$foto,$verfasser,$zustand){
        $query = 'INSERT INTO db_m120_modularbeit.buecher(katalog,nummer,kurztitle,kategorie,verkauft,kaufer,autor,title,sprache,foto,verfasser,zustand) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)' ;
        $stmt = $this->connect()->prepare($query);

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
        $likename = "%$input%";
        $query = 'SELECT * from db_m120_modularbeit.kategorien where id like'.$likename;
        return $this->connect()->query($query);
    }

}