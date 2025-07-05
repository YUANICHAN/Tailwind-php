<?php

require 'db.php';

    if(isset($_GET['ID'])){
        $id = $_GET['ID'];

        $sql = "SELECT * FROM students WHERE ID = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $student = $result->fetch_assoc();
        } else {
            echo "Student not found.";
            exit;
        }
    } else {
        echo "No ID selected";
    }
?>