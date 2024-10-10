<?php
// Include the base class
require_once 'Book.php';

// Derived Class: EBook
class EBook extends Book {
    private $fileSize; // Size of the eBook in MB

    // Constructor
    public function __construct($Title, $Author, $Publication_Year, $fileSize) {
        // Call the parent constructor
        parent::__construct($Title, $Author, $Publication_Year);
        $this->fileSize = $fileSize;
    }

    // Override the getDetails method to include file size
    public function getDetails() {
        return parent::getDetails() . ", File Size: {$this->fileSize} MB";
    }
}
?>
