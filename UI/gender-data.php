<?php
require 'db.php';

header('Content-Type: application/json');

$sql = "SELECT gender, COUNT(*) as count FROM students GROUP BY gender";
$result = $connection->query($sql);

$data = ['labels' => [], 'counts' => []];
while ($row = $result->fetch_assoc()) {
    $data['labels'][] = $row['gender'];
    $data['counts'][] = (int)$row['count'];
}

echo json_encode($data);
