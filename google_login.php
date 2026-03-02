<?php

require __DIR__ . "/vendor/autoload.php";

$client = new Google\Client;

$client->setClientId("736530803603-eeup2s6oeuqmaq3mqb3rtoq1p3pp600p.apps.googleusercontent.com");
$client->setClientSecret("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e");
$client->setRedirectUri("http://localhost/WEBDETAKMEDIS/redirect.php");

$client->addScope("email");
$client->addScope("profile");


header("Location: " . $client->createAuthUrl());
exit;
