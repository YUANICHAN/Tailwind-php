<?php
    spl_autoload_register(function($classname){
        $path = "CLASSES/" . $classname ."php";
        if(file_exists($path)){
            require_once $path;
        } else {
            die("Class $path not found");
        }
    });
?>