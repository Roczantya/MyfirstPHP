<?php
// Sertakan kelas dasar
require_once 'Book.php';

// Kelas Turunan: EBook
class Ebook extends Book {
    private $fileSize;

    public function __construct($title, $author, $publicationYear, $fileSize) {
        parent::__construct($title, $author, $publicationYear, 'E-Book');
        if ($fileSize <= 100){ // Memanggil konstruktor kelas induk
        $this->fileSize = $fileSize;
        } else {
            print("Error: Ukuran file lebih dari 100 MB"); // Melempar pengecualian jika tidak valid
        }
    }

    public function getDetails() {
        return parent::getDetails() . "\n" . "Ukuran File: " . $this->fileSize . " MB";
    }
}
?>
