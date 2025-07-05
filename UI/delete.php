<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM students WHERE ID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: AllStudent.php"); // Redirect after delete
        exit();
    } else {
        echo "Error deleting record.";
    }
} else {
    echo "No ID specified.";
}
?>
