<?php
// Database connection
$mysqli = new mysqli("localhost", "root", "", "accounts"); // Replace with your database name

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
