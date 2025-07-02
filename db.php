<?php
    $connection = new mysqli("localhost", "root", "", "php");

    if($connection->connect_error){
        die("Error: ". $connection->connect_error);
    }
?>