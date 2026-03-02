<?php

require __DIR__ . "/vendor/autoload.php";
include "koneksi.php";

session_start();
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$client = new Google\Client();

$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri("http://localhost/WEBDETAKMEDIS/redirect.php");

if (!isset($_GET["code"])) {
    exit("Login gagal");
}

$token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
$client->setAccessToken($token['access_token']);

$oauth = new Google\Service\Oauth2($client);
$userinfo = $oauth->userinfo->get();

$email = $userinfo->email;
$nama  = $userinfo->name;

/* cek user */
$cek = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE email='$email'"
);

if (mysqli_num_rows($cek) == 0) {

    mysqli_query(
        $conn,
        "INSERT INTO users (nama,email,password)
         VALUES ('$nama','$email','google_login')"
    );
}

$_SESSION['user'] = $email;

header("Location: ppglms.html");
exit();
