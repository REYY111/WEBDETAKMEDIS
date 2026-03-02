<?php

$newData = json_decode(file_get_contents("php://input"), true);

$file = "content.json";

/* baca lama */
if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true);
} else {
    $data = [];
}

/* tambah data baru */
$data[] = $newData;

/* simpan lagi */
file_put_contents(
    $file,
    json_encode($data, JSON_PRETTY_PRINT)
);

echo "Data berhasil ditambahkan!";
