<?php

$db_host = 'localhost:3307';
$db_user = 'root'; 
$db_pass = '';     
$db_name = 'scam_aware';

// Create a new connection to the database
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check for a connection error
if ($conn->connect_error) {
    // If there is an error, kill the script and show the error
    die("Connection failed: " . $conn->connect_error);
}
?>