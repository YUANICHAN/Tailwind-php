<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $gmail = $_POST['gmail'];
    $location = $_POST['location'];

    $sql = "INSERT INTO Info (Firstname, Gmail, Location, Time_in) VALUES (?, ?, ?, NOW())";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $firstname, $gmail, $location);
    $stmt->execute();

    header("Location: php.php");
    exit();
}
?>
