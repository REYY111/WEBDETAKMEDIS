<?php

include "koneksi.php";

$nama  = $_POST['nama'];
$email = $_POST['email'];
$pass  = password_hash($_POST['pass'], PASSWORD_DEFAULT);

$akun = "INSERT INTO users (nama, email, password)
         VALUES ('$nama', '$email', '$pass')";

if (mysqli_query($conn, $akun)) {
    header("Location: login.html");
    exit();
} else {
    echo "Gagal: " . mysqli_error($conn);
}
