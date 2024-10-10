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
        if (empty($title)) {
            print("Error: Judul tidak boleh kosong."); // Lempar pengecualian jika kosong
        }
        if (is_string($title) && strlen($title) <= 100) {
            $this->title = $title;
        } else {
            print("Error: Judul tidak valid atau lebih dari 100 karakter.");
        }
    }

    public function getAuthor() {
        return $this->author; // Ubah dari $this->Author ke $this->author
    }

    public function setAuthor($author) {
        if (empty($author)) {
            print("Error: Nama pengarang tidak boleh kosong."); // Lempar pengecualian jika kosong
        }
        if (is_string($author) && strlen($author) <= 100) {
            $this->author = $author;
        } else {
            print("Error: Nama pengarang tidak valid atau lebih dari 100 karakter.");
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