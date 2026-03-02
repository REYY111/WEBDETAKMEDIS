<?php
session_start();
include "koneksi.php";

$id = $_SESSION['id'];
$sql = "SELECT * FROM db WHERE id= '$id'";
$q= mysqli_query($conn,$sql);

$data= mysqli_fetch_assoc($data);


echo "selamat datang ". $data['nama'];

?>