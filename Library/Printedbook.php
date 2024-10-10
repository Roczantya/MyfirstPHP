<?php 
     require_once 'Book.php';

     class PrintedBook extends Book{
        private $numberofpages;

        public function __construct($Title, $Author, $Publication_Year, $numberofpages) {
            // Call the parent constructor
            parent::__construct($Title, $Author, $Publication_Year);
            $this->numberofpages = $numberofpages;
        }

        public function getDetails() {
            return parent::getDetails() . ", Pages: {$this->numberOfPages}";
        }

     }

?>