<?php
$servername = "localhost"; // Server name 
$username = ""; 
$password = ""; 
$dbname = "sheet_music_db"; // Name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Terminate script if connection fails
}
?>
