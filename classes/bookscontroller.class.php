<?php
class BooksController extends Books{

    public function createBook($katalog,$nummer,$kurztitle,$kategorie,$verkauft,$kaufer,$autor,$title,$sprache,$foto,$verfasser,$zustand){
        $this->setBooks($katalog,$nummer,$kurztitle,$kategorie,$verkauft,$kaufer,$autor,$title,$sprache,$foto,$verfasser,$zustand);
    }
}