<?php
    namespace Reports;
    
    class ExcelReport extends Report{

        public function __construct($title)
        {
            parent::__construct($title);
        }
        public function generate()
        {
            return "Generating Excel Report: $this->title";
        }
    }
?>