<?php

$dbHost = 'localhost'; 
$dbUsername = 'root'; 
$dbPassword = ''; 
$dbName = 'contact_system'; 

// Create database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$conn->set_charset("utf8mb4");
?>
