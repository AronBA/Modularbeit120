<?php
class Books extends Dbh {

    protected function getBooks($offset,$search="",$filter="",$mode="asc"){

        if ($offset <  0){
            $offset = 0;
        }
        if ($search != ""){
            $search = "%$search%";
            if ($filter == 1 and $mode == "asc"){
                $query = 'SELECT * from db_m120_modularbeit.buecher where autor like ? ';
                $con = $this->connect();
                $stmt = $con->prepare($query);
                $stmt->bind_param('s', $search);

            } else if ($filter == 2 and $mode =="asc") {
                $query = 'SELECT * from db_m120_modularbeit.buecher where title like ? ';
                $con = $this->connect();
                $stmt = $con->prepare($query);
                $stmt->bind_param('s', $search);

            } else if ($filter == 3 and $mode == "asc") {
                $query = 'SELECT * from db_m120_modularbeit.buecher where kurztitle like ? ';
                $con = $this->connect();
                $stmt = $con->prepare($query);
                $stmt->bind_param('s', $search);

            }
            else if ($filter == 1 and $mode == "desc"){
                $query = 'SELECT * from db_m120_modularbeit.buecher where autor like ? order by autor desc';
                $con = $this->connect();
                $stmt = $con->prepare($query);
                $stmt->bind_param('s', $search);

            } else if ($filter == 2 and $mode =="desc") {
                $query = 'SELECT * from db_m120_modularbeit.buecher where title like ? order by title desc';
                $con = $this->connect();
                $stmt = $con->prepare($query);
                $stmt->bind_param('s', $search,);

            } else if ($filter == 3 and $mode == "desc") {
                $query = 'SELECT * from db_m120_modularbeit.buecher where kurztitle like ? order by kurztitle desc  ';
                $con = $this->connect();
                $stmt = $con->prepare($query);
                $stmt->bind_param('s', $search);


            } else {
                $query = 'SELECT * from db_m120_modularbeit.buecher where id = ? or kurztitle like ? or title like ? or autor like ? limit  20 OFFSET ? ';
                $con = $this->connect();
                $stmt = $con->prepare($query);
                $stmt->bind_param('ssssi', $search,$search,$search,$search,$offset);}
        }else {
            $query = 'SELECT * from db_m120_modularbeit.buecher where id = ? or kurztitle = ? or title = ? or autor = ? limit  20 OFFSET ? ';
            $con = $this->connect();
            $stmt = $con->prepare($query);
            $stmt->bind_param('ssssi', $search,$search,$search,$search,$offset);
        }

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



}