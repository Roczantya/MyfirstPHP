<?php
// Sertakan kelas dasar
require_once 'Book.php';

// Kelas Turunan: EBook
class Ebook extends Book {
    private $fileSize;

    public function __construct($title, $author, $publicationYear, $fileSize) {
        parent::__construct($title, $author, $publicationYear, 'E-Book'); // Memanggil konstruktor kelas induk
        $this->fileSize = $fileSize;
    }

    public function getDetails() {
        return parent::getDetails() . "\n" . "Ukuran File: " . $this->fileSize . " MB";
    }
}
?>
