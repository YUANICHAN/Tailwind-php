<?php
    namespace Reports;
    
    abstract class Report{
        protected $title;

        public function __construct($title)
        {
            $this->title = $title;
        }

        abstract public function generate();
    }
?>