<?php 
class Book{
    private $Title;
    private $Author;
    private $Publication_Year;
    private $maxtitleLength = 100;
    private $maxAuthorLength = 100;


    public function __construct($Title, $Author, $Publication_Year){
        $this->Title = $Title;
        $this->Author = $Author;
        $this->Publication_Year = $Publication_Year;
    }

    public function getTitle(){
        return $this->Title;
    }

    public function setTitle($Title){
        if (is_string($Title) && !empty($Title)) {
            if (strlen($Title) <= $this->maxtitleLength) {
                $this->Title = $Title;
            } else {
                echo ("Error: Judul terlalu panjang! Maksimal " . $this->maxtitleLength . " karakter.\n");
            }
        } else {
            // Ini adalah perbaikan yang benar
            echo ("Error: Judul Buku Tidak valid.\n");
        }
    }

    public function getAuthor(){
        return $this->Author;
    }

    public function setAuthor($Author){
        if (is_string($Author) && !empty($Author)) {
            if (strlen($Author) <= $this->maxAuthorLength) {
                $this->Author = $Author;
            } else {
                echo ("Error: Nama terlalu panjang! Maksimal " . $this->maxAuthorLength . " karakter.\n");
            }
        } else {
            // Ini adalah perbaikan yang benar
            echo ("Error: Nama Pengarang Tidak valid.\n");
        }
    }
    public function getPublication_Year(){
        return $this->Publication_Year;
    }

    public function setPublication_Year($Publication_Year){
        if (is_numeric($Publication_Year) && $Publication_Year >= 1500 && $Publication_Year <= 2024 ){
            $this->Publication_Year = $Publication_Year;
        } else {
            echo ("Error: Tahun Publikasi tidak valid harus diantara tahun 1500 sampai 2024");
        }
    }

}
