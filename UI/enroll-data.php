<?php
require 'db.php';

header('Content-Type: application/json');

$sql = "SELECT MONTH(registration_date) AS month, COUNT(*) AS count
        FROM students
        GROUP BY MONTH(registration_date)
        ORDER BY month";
$result = $connection->query($sql);

$data = [
    'labels' => [],
    'counts' => []
];

$months = [1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'May',6=>'Jun',7=>'Jul',8=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec'];

while ($row = $result->fetch_assoc()) {
    $data['labels'][] = $months[$row['month']];
    $data['counts'][] = (int)$row['count'];
}

echo json_encode($data);
