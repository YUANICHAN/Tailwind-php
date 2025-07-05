<?php
require 'db.php';

if ($connection->connect_error) {
    die(json_encode(['error' => 'Database connection failed']));
}

$response = [
    'total_students' => 0,
    'total_courses' => 0,
    'total_fees' => 0
];

$result1 = $connection->query("SELECT COUNT(*) as total FROM students");
if ($result1) {
    $row = $result1->fetch_assoc();
    $response['total_students'] = (int)$row['total'];
}

$result2 = $connection->query("SELECT COUNT(DISTINCT class) as total FROM students");
if ($result2) {
    $row = $result2->fetch_assoc();
    $response['total_courses'] = (int)$row['total'];
}

$response['total_fees'] = $response['total_students'] * 500;

header('Content-Type: application/json');
echo json_encode($response);
?>
