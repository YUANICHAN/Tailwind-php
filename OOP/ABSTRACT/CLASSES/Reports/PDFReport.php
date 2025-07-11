<?php
    namespace Reports;
    
    class PDFReport extends Report{

        public function __construct($title)
        {
            parent::__construct($title);
        }
        public function generate()
        {
            return "Generating PDF Report: $this->title";
        }
    }
?>