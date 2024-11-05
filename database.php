<?php
$servername = "localhost";
$username = "arpi";
$password = "Arpita@10#";
$database = "website";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
