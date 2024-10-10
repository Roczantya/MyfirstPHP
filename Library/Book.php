<?php 
class Book {
    protected $title;
    protected $author;
    protected $publicationYear;
    protected $bookType;

    public function __construct($title, $author, $publicationYear, $bookType) {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPublication_Year($publicationYear);
        $this->setBookType($bookType);
    }

    public function getTitle() {
        return $this->title; // Ubah dari $this->Title ke $this->title
    }

    public function setTitle($title) {
        if (is_string($title) && !empty($title)) {
            if (strlen($title) <= 100) {
                $this->title = $title; // Ubah dari $this->Title ke $this->title
            } else {
                echo ("Error: Judul tidak boleh lebih dari 100 karakter.<br>");
            }
        } else {
            echo ("Error: Judul tidak valid.<br>");
        }
    }

    public function getAuthor() {
        return $this->author; // Ubah dari $this->Author ke $this->author
    }

    public function setAuthor($author) {
        if (is_string($author) && !empty($author)) {
            if (strlen($author) <= 100) {
                $this->author = $author; // Ubah dari $this->Author ke $this->author
            } else {
                echo ("Error: Nama pengarang tidak boleh lebih dari 100 karakter.<br>");
            }
        } else {
            echo ("Error: Nama pengarang tidak valid.<br>");
        }
    }

    public function getPublication_Year() {
        return $this->publicationYear; // Ubah dari $this->Publication_Year ke $this->publicationYear
    }

    public function setPublication_Year($publicationYear) {
        if (is_numeric($publicationYear) && $publicationYear >= 1500 && $publicationYear <= date("Y")) {
            $this->publicationYear = $publicationYear; // Ubah dari $this->Publication_Year ke $this->publicationYear
        } else {
            echo ("Error: Tahun publikasi harus antara 1500 dan " . date("Y") . ".<br>");
        }
    }

    public function getBookType() {
        return $this->bookType; // Ubah dari $this->BookType ke $this->bookType
    }

    public function setBookType($bookType) {
        $this->bookType = $bookType;
    }

    public function getDetails() {
        return "Judul: " . $this->title . "\n" .
               "Pengarang: " . $this->author . "\n" .
               "Tahun Publikasi: " . $this->publicationYear . "\n" .
               "Tipe: " . $this->bookType;
    }
}
?>