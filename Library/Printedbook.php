<?php 
// Sertakan kelas dasar
require_once 'Book.php';

// Kelas Turunan: PrintedBook
class Printedbook extends Book {
    private $numberOfPages; // Jumlah halaman buku cetak

    public function __construct($Title, $Author, $Publication_Year, $BookType, $numberOfPages) {
        // Panggil konstruktor induk
        parent::__construct($Title, $Author, $Publication_Year, $BookType);
        $this->numberOfPages = $numberOfPages;
    }

    // Override metode getDetails untuk menyertakan jumlah halaman
    public function getDetails() {
        return "Buku Cetak - Halaman: " . $this->numberOfPages . ", Judul: " . $this->getTitle() . ", Pengarang: " . $this->getAuthor() . ", Tahun: " . $this->getPublication_Year() . ", Tipe Buku: " . $this->getBookType();
    }
}
?>
