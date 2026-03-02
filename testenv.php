<?php

require __DIR__ . "/vendor/autoload.php";

/* Load .env */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

/* Test tampilkan ENV */
echo "<pre>";
var_dump($_ENV);
echo "</pre>";
