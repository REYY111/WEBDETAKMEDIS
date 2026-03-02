<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    exit;
}

$user_id = $_SESSION['user_id'];
$filename = "data_user_$user_id.csv";

if (!file_exists($filename)) {
    echo json_encode([]);
    exit;
}

$data = [];
$f = fopen($filename, "r");

// kalau ada header, skip
$header = fgetcsv($f);

while (($row = fgetcsv($f)) !== false) {
    $data[] = [
        "timestamp"     => $row[0],
        "red_raw"       => $row[1],
        "ir_raw"        => $row[2],
        "red_filtered"  => $row[3],
        "ir_filtered"   => $row[4]
    ];
}

fclose($f);

echo json_encode($data);
