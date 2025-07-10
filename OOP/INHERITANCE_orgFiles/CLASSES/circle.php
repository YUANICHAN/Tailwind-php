<?php
    class circle extends shapes{

        public function __construct($name)
        {
            parent::__construct($name);
        }

        public function getArea($radius){
            return "$this->name: " . 3.14 * ($radius * $radius);
        }
    }
?>