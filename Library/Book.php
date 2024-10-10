<?php
// Kelas Dasar: Book
    class Book {
        protected $title;
        protected $author;
        protected $publicationYear;
        protected $bookType;
    
        public function __construct($title, $author, $publicationYear, $bookType) {
            $this->title = $title;
            $this->author = $author;
            $this->publicationYear = $publicationYear;
            $this->bookType = $bookType;
        }
    
        
    public function getTitle() {
        return $this->Title;
    }

    public function setTitle($Title) {
        if (is_string($Title) && !empty($Title)) {
            if (strlen($Title) <= $this->maxtitleLength) {
                $this->Title = $Title;
            } else {
                echo ("Error: Judul tidak boleh lebih dari " . $this->maxtitleLength . " karakter.");
            }
        } else {
            echo ("Error: Judul tidak valid.");
        }
    }

    public function getAuthor() {
        return $this->Author;
    }

    public function setAuthor($Author) {
        if (is_string($Author) && !empty($Author)) {
            if (strlen($Author) <= $this->maxAuthorLength) {
                $this->Author = $Author;
            } else {
                echo ("Error: Nama pengarang tidak boleh lebih dari " . $this->maxAuthorLength . " karakter.");
            }
        } else {
            echo ("Error: Nama pengarang tidak valid.");
        }
    }

    public function getPublication_Year() {
        return $this->Publication_Year;
    }

    public function setPublication_Year($Publication_Year) {
        if (is_numeric($Publication_Year) && $Publication_Year > 0) {
            $this->Publication_Year = $Publication_Year;
        } else {
            echo ("Error: Tahun publikasi tidak valid.");
        }
    }

    public function getBookType() {
        return $this->BookType;
    }

    public function setBookType($BookType) {
        $this->BookType = $BookType;
    }

    public function getDetails() {
            return "Judul: " . $this->title . "\n" .
                   "Pengarang: " . $this->author . "\n" .
                   "Tahun Publikasi: " . $this->publicationYear . "\n" .
                   "Tipe: " . $this->bookType;
        }
    } 
?>
