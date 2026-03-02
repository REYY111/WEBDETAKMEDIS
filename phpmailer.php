<?php
include "koneksi.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if (isset($_POST['email'])) {

    $userEmail = $_POST['email'];

    // 1. cek email di database
    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {
        // email tidak terdaftar
        echo "<script>
                alert('Email $userEmail tidak ditemukan. Silakan coba lagi.');
                document.location.href = 'login.php';
              </script>";
        exit;
    }

    // 2. email terdaftar → kirim email reset
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'pubdokelitia25@gmail.com';
        $mail->Password   = 'jpvp anug iqbv mllt';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        $mail->setFrom('pubdokelitia25@gmail.com', 'Admin');
        $mail->addAddress($userEmail); // kirim ke email yang dimasukkan user
        $mail->addReplyTo('pubdokelitia25@gmail.com', 'Admin');

        $mail->isHTML(true);
        $mail->Subject = 'Reset Password';
        $mail->Body    = 'Klik link berikut untuk reset password: 
                          <a href="https://example.com/reset.php?email=' . $userEmail . '">Reset Password</a>';

        $mail->send();
        echo "<script>
                alert('Email reset password berhasil dikirim ke $userEmail!');
                document.location.href = 'login.php';
              </script>";
    } catch (Exception $e) {
        echo "Email gagal dikirim. Error: {$mail->ErrorInfo}";
    }
}
