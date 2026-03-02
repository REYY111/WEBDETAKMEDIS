<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "userdetakmedis";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo "login gagal" . mysqli_connect_error();
    exit();
}
