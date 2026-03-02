<?php
session_start();
include "koneksi.php";

$nama = $_POST['nama'];
$pass = $_POST['pass'];

$ambildata = "SELECT * FROM users WHERE nama='$nama'";
$sql = mysqli_query($conn, $ambildata);

$data = mysqli_fetch_assoc($sql);

if ($data && password_verify($pass, $data['password'])) {
    $_SESSION['id'] = $data['id'];
    header("Location: medic-free-lite/landingpage.html");
    exit();
} else {
    echo "gagal";
}
