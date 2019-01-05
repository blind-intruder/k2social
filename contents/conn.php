<?php

$servername = 'localhost';
$username = 'root';
$password = '198273645';

// Create connection
$conn = new mysqli($servername, $username, $password,'k2');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} 
?>