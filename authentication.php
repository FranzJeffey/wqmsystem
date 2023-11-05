<?php
// Database Credentials
$hostname = 'localhost';
$username = 'root';
$db_password = '';
$database = 'wqmsystem';

// Create connection
$conn = new mysqli($hostname, $username, $db_password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>