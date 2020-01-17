<?php

// Error display
// ini_set('display_errors', 'On');
// error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    include('404.php');
    exit();
}

const TO_EMAIL = 'scott.norton12@gmail.com';

// Get info from request
$fromEmail = $_POST['email'];
$subject = $_POST['subject'];
$msg = $_POST['message'];

$headers = 'From: ' . $fromEmail;
$result = mail(TO_EMAIL, $subject, $msg, $headers);
if (!$result) {   
    $data = [ 'success' => false ]; 
    http_response_code(500);
}
else {
    $data = [ 'success' => true ]; 
}
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
echo json_encode($data);