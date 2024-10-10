<?php 
// Sertakan kelas dasar
require_once 'Book.php';

// Kelas Turunan: PrintedBook
class Printedbook extends Book {
    private $numberOfPages;

    public function __construct($title, $author, $publicationYear, $numberOfPages) {
        parent::__construct($title, $author, $publicationYear, 'Printed Book'); // Memanggil konstruktor kelas induk
        $this->numberOfPages = $numberOfPages;
    }

    public function getDetails() {
        return parent::getDetails() . "\n" . "Jumlah Halaman: " . $this->numberOfPages;
    }
}
?>
