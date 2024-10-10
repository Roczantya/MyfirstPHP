<?php
// Sertakan kelas dasar
require_once 'Book.php';

// Kelas Turunan: EBook
class Ebook extends Book {
    private $fileSize; // Ukuran eBook dalam MB

    // Konstruktor
    public function __construct($Title, $Author, $Publication_Year, $BookType, $fileSize) {
        // Panggil konstruktor induk
        parent::__construct($Title, $Author, $Publication_Year, $BookType);
        $this->fileSize = $fileSize;
    }

    // Override metode getDetails untuk menyertakan ukuran file
    public function getDetails() {
        return "EBook - Ukuran: " . $this->fileSize . " MB, Judul: " . $this->getTitle() . ", Pengarang: " . $this->getAuthor() . ", Tahun: " . $this->getPublication_Year() . ", Tipe Buku: " . $this->getBookType();
    }
}
?>
