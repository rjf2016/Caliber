<?php

// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
require 'vendor/autoload.php';
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");
$client_email = $_POST['email'];

error_log("---email start---");
error_log($client_email);
error_log("---email end---");


//echo $response->$client_email;


$from = new SendGrid\Email("Caliber User", $client_email);   //"tjf081@gmail.com");
$subject = "Email from Caliber Partners site";
$to = new SendGrid\Email("New User", "tjf081@gmail.com");
$content = new SendGrid\Content("text/plain", "New email from: " . $client_email);
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = getenv('SENDGRID_API_KEY');

$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);

echo $response->statusCode();
//echo $response->headers();
//echo $response->body();
?>