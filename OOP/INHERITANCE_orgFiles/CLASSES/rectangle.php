<?php
    class rectangle extends shapes{

        public function __construct($name)
        {
            parent::__construct($name);
        }

        public function getArea($weight, $height){
            return "$this->name: " . ($weight * $height);
        }
    }
?>