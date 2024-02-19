<?php
$server_name = "127.0.0.1";
$username = "root";
$password = "";
$database = "tourism";

// Create connection
$conn = new mysqli($server_name, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
