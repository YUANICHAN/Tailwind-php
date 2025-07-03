<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $gmail = $_POST['gmail'];
    $location = $_POST['location'];

    $sql = "UPDATE Info SET Firstname=?, Gmail=?, Location=? WHERE id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssi", $firstname, $gmail, $location, $id);
    $stmt->execute();

    header("Location: php.php");
    exit();
}
?>
