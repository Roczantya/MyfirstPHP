<?php
// Kelas Dasar: Book
class Book {
    private $Title; // Judul buku
    private $Author; // Pengarang
    private $Publication_Year; // Tahun publikasi
    private $BookType; // Tipe buku
    private $maxtitleLength = 100; // Panjang maksimal judul
    private $maxAuthorLength = 100; // Panjang maksimal nama pengarang

    public function __construct($Title, $Author, $Publication_Year, $BookType) {
        $this->setTitle($Title);
        $this->setAuthor($Author);
        $this->setPublication_Year($Publication_Year);
        $this->setBookType($BookType); // Set tipe buku saat konstruksi
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
}
?>
