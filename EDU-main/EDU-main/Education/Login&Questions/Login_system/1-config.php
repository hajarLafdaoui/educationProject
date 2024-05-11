<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_db";

// Create connection
$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    
?>
