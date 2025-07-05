<?php
    $connection = new mysqli("localhost", "root", "", "StudentManagement");

    if($connection ->connect_error){
        die("". $connection ->connect_error);
    }
?>