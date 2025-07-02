<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (is_numeric($id)) {
        $stmt = $connection->prepare("DELETE FROM Info WHERE ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

// Always redirect back to main page
header("Location: php.php");
exit();
?>
